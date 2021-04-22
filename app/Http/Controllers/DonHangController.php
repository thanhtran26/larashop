<?php

namespace App\Http\Controllers;
use App\Models\NguoiDung;
use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DonHangController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function getDanhSach(Request $request)
	{
		$request->user()->authorizeRoles(['saler', 'admin']);
		$donhang = DonHang::orderBy('created_at', 'desc')->get();
		return view('donhang.danhsach', compact('donhang'));
	}
	public function getThem()
	{
		return view('donhang.them');
	}
	public function postThem(Request $request)
	{
		$this->validate($request, [
			'dienthoaikhachhang' => ['required', 'numeric'],
			'emailgiaohang' => ['required', 'max:255', 'email'],
		]);
		
		$orm = new DonHang();
		$orm->user_id = $request->user_id;
		$orm->dienthoaikhachhang = $request->dienthoaikhachhang;
		$orm->emailgiaohang = $request->emailgiaohang;
		$orm->tinhtrang = $request->tinhtrang;
		$orm->save();
		return redirect()->route('donhang');
	}
	public function getSua($id)
	{
		$donhang = DonHang::find($id);
		return view('donhang.sua', compact('donhang'));
	}
	public function postSua(Request $request, $id)
	{
		$this->validate($request, [
			'dienthoaikhachhang' => ['required', 'numeric'],
			'emailgiaohang' => ['required', 'max:255', 'email'],
		]);
		
		$orm = DonHang::find($id);
		$orm->dienthoaikhachhang = $request->dienthoaikhachhang;
		$orm->emailgiaohang = $request->emailgiaohang;
		$orm->tinhtrang = $request->tinhtrang;
		$orm->save();
		return redirect()->route('donhang');
	}
	
	public function getXoa($id)
	{
		$orm = DonHang::find($id);
		$orm->delete();
		
		$chitiet = DonHang_ChiTiet::where('donhang_id', $orm->id)->first();
		$chitiet->delete();

		return redirect()->route('donhang');
	}
}
