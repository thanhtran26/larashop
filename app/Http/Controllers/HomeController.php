<?php

namespace App\Http\Controllers;
use App\Models\Slide;
use App\Models\DonHang;
use App\Models\SanPham;
use App\Models\Hang;
use App\Models\Role;
use App\Models\ThongSo;
use App\Models\ChiTietTS;
use App\Models\LoaiSanPham;
use App\Models\DonHang_ChiTiet;
use App\Models\NguoiDung;
use App\Mail\DatHangEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Facades\Cart;
use Socialite;


class HomeController extends Controller
{
	
	
	public function getDatHangDemo()
	{
		// Thêm Đơn hàng demo
			$donhang = DonHang::create([
			'user_id' => Auth::user()->id,
			'dienthoaigiaohang' => '0982761913',
			'diachigiaohang' => 'TP. Long Xuyên - An Giang',
		]);

		// Thêm Đơn hàng chi tiết demo
		DonHang_ChiTiet::create([
			'donhang_id' => $donhang->id,
			'sanpham_id' => 2,
			'soluongban' => 1,
			'dongiaban' => 5990000,
		]);

		DonHang_ChiTiet::create([
			'donhang_id' => $donhang->id,
			'sanpham_id' => 142,
			'soluongban' => 1,
			'dongiaban' => 350000,
		]);
		
		Mail::to(Auth::user()->email)->send(new DatHangEmail($donhang));
		return redirect()->route('frontend.dathangthanhcong');

	}
    
	public function getHome()
	{	
		$hang = Hang::inRandomOrder()->limit(4)->get();
		$sanpham = SanPham::paginate(8);
		$sanpham_km=SanPham::where('khuyenmai','<>',0)->limit(8)->get();	
		$slide=Slide::inRandomOrder()->first();
		$slide2=Slide::inRandomOrder()->first();
		return view('frontend.index', compact('sanpham','hang','slide','slide2','sanpham_km'));
	}
	
	public function getSanPham($tenloai_slug = '')
	{
		$sanpham = SanPham::paginate(12);
		return view('frontend.sanpham',compact('sanpham'));
	}
	public function postSanPham(Request $request)
{
 if($request->sapxep == 'popularity') // Mua nhiều nhất
 {
 $sanpham = SanPham::leftJoin('donhang_chitiet', 'sanpham.id', '=', 'donhang_chitiet.sanpham_id')
 ->selectRaw('sanpham.*, coalesce(sum(donhang_chitiet.soluongban), 0) tongsoluongban')
	->groupBy('sanpham.id')
 ->orderBy('tongsoluongban', 'desc')
 ->paginate(16);
 
 // Ghi vào SESSION
 session()->put('sapxep', 'popularity');
 }
 elseif($request->sapxep == 'date') // Mới nhất
 {
 $sanpham = SanPham::orderBy('created_at', 'desc')->paginate(16);
 
 // Ghi vào SESSION
 session()->put('sapxep', 'date');
 }
 elseif($request->sapxep == 'price') // Xếp theo giá: thấp đến cao
 {
 $sanpham = SanPham::orderBy('dongia', 'asc')->paginate(16);
 
 // Ghi vào SESSION
 session()->put('sapxep', 'price');
 }
 elseif($request->sapxep == 'price-desc') // Xếp theo giá: cao xuống thấp
 {
 $sanpham = SanPham::orderBy('dongia', 'desc')->paginate(16);
 
 // Ghi vào SESSION
 session()->put('sapxep', 'price-desc');
 }
 else // Mặc định
 {
 $sanpham = SanPham::paginate(16);
 
 // Ghi vào SESSION
 session()->put('sapxep', 'default');
 }
 
 return view('frontend.sanpham', compact('sanpham'));
}

	public function getSanPham_ChiTiet($tenloai_slug, $tensanpham_slug)
	{	
		$thongso_sp=ThongSo::all();
		/* $id_sanpham=SanPham::where('tensanpham_slug',$tensanpham_slug)->first(); */
		$sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();
		$thongso_sp=ThongSo::where('id_loaisanpham',$sanpham->loaisanpham_id)->get();;
		$chitiet_ts=ChiTietTS::where('id_sanpham',$sanpham->id)->get();
		$sp_lienquan=SanPham::where('tensanpham_slug','<>',$tensanpham_slug)->inRandomOrder()->limit(8)->get();	
			
		return view('frontend.sanpham_chitiet',compact('sanpham','sp_lienquan','thongso_sp','chitiet_ts') );
	}
	public function getLoaiSanPham($loai){
		$ten=LoaiSanPham::where('id',$loai)->first();
		$sp_theoloai = SanPham::where('loaisanpham_id',$loai)->get();
		return view('frontend.loaisanpham',compact('sp_theoloai','ten'));
	}
	public function getHang($hxs){
		$ten=Hang::where('id',$hxs)->first();
		$sp_theohang = SanPham::where('id_hang',$hxs)->get();
		return view('frontend.hang',compact('sp_theohang','ten'));
	}
	public function getTimKiem(Request $req)
	{
		$sanpham=SanPham::where('tensanpham','like','%'.$req->key.'%')->orWhere('dongia_km',$req->key)->get();
		
		return view('frontend.timkiem',compact('sanpham'));
	}

	public function getDoiTra()
	{
		return view('frontend.doitra');
	}
	public function getGioHang()
	{
		if(Cart::count() <= 0)
			return view('frontend.giohang_rong');
		else
			return view('frontend.giohang');
	}
	
	public function getGioHang_Them($tensanpham_slug)
	{
		$sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();
		Cart::add([
			'id' => $sanpham->id,
			'name' => $sanpham->tensanpham,
			'price' => $sanpham->dongia_km,
			'qty' => 1,
			'weight' => 0,
			'options' => [
				'image' => $sanpham->hinhanh
			]
		]);
		return redirect()->route('frontend');
	}
	
	public function getGioHang_Xoa($row_id)
	{
		Cart::remove($row_id);
		return redirect()->route('frontend.giohang');
	}
	
	public function getGioHang_XoaTatCa()
	{
		Cart::destroy();
		return redirect()->route('frontend.giohang');
	}
	
	public function getGioHang_Giam($row_id)
	{
		$row = Cart::get($row_id);
		if($row->qty > 1)
		{
			Cart::update($row_id, $row->qty - 1);
		}
		return redirect()->route('frontend.giohang');
	}
	
	public function getGioHang_Tang($row_id)
	{
		$row = Cart::get($row_id);
		if($row->qty < 10)
		{
			Cart::update($row_id, $row->qty + 1);
		}
		return redirect()->route('frontend.giohang');
	}
	
	public function getDatHang()
	
	{
	
		return view('frontend.dathang');
	}
	
	public function postDatHang(Request $request)
	{
		$this->validate($request, [
			'emailgiaohang' => ['required', 'max:255'],
			'dienthoaikhachhang' => ['required', 'max:255'],
		]);

		// Lưu vào đơn hàng
		$dh = new DonHang();
		$dh->nguoidung_id = Auth::user()->id;
		$dh->emailgiaohang = $request->emailgiaohang;
		$dh->dienthoaikhachhang = $request->dienthoaikhachhang;
		$dh->address = $request->address;
		$dh->save();
		

		// Lưu vào đơn hàng chi tiết
		foreach(Cart::content() as $value)
		{	
			$sp=SanPham::find($value->id);
			$ct = new DonHang_ChiTiet();
			$ct->donhang_id = $dh->id;
			$ct->sanpham_id = $value->id;
			$ct->soluongban = $value->qty;
			$ct->dongiaban = $value->price;
			$sp->soluong-=$value->qty;
			$sp->save();
			$ct->save();
			
		}
			Mail::to(Auth::user()->email)->send(new DatHangEmail($dh));
		return redirect()->route('frontend.dathangthanhcong');
	}
	
	public function getDatHangThanhCong()
	{
		Cart::destroy();

		return view('frontend.dathangthanhcong');
	}
	
	public function getDangKy()
	{
		return view('frontend.dangky');
	}
	
	public function getDangNhap()
	{
		return view('frontend.dangnhap');
	}
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function getGoogleLogin()
	{
		return Socialite::driver('google')->redirect();
	}
	public function getGoogleCallback()
	{
		try
		{
			$user = Socialite::driver('google')
				->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
				->stateless()
				->user();
		}
		catch(Exception $e)
		{
			return redirect()->route('khachhang.dangnhap')->with('warning', 'Lỗi xác thực. Xin vui lòng thử lại!');
		}
		$existingUser = NguoiDung::where('email', $user->email)->first();
		if($existingUser)
		{
			// Nếu người dùng đã tồn tại thì đăng nhập
			Auth::login($existingUser, true);
			return redirect()->route('khachhang');
		}
		else
		{
			// Nếu chưa tồn tại người dùng thì thêm mới
			$newUser = NguoiDung::create([
				'name' => $user->name,
				'username' => Str::before($user->email, '@'),
				'email' => $user->email,
				'password' => Hash::make('12345678'), // Gán mật khẩu tự do
				
			]);
			$newUser
			->roles()
			->attach(Role::where('name', 'employee')->first());
			// Sau đó đăng nhập
			Auth::login($newUser, true);
			return redirect()->route('khachhang');
		}
	}
		public function index()
		{
			return view('home');
		}
		
}
