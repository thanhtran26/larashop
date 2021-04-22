<?php
namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class NguoiDungController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function getDanhSach(Request $request)
	{
		$rl= Role::join('nguoi_dung_role', 'nguoi_dung_role.role_id', '=', 'roles.id')
			->join('nguoidung', 'nguoidung.id', '=', 'nguoi_dung_role.nguoi_dung_id')
            ->get();
		$request->user()->authorizeRoles(['admin']);
		$nguoidung = NguoiDung::all();
		return view('nguoidung.danhsach', ['nguoidung' => $nguoidung, 'rl'=>$rl]);
	}
	public function getThem()
	{
		return view('nguoidung.them');
	}
	public function postThem(Request $request)
	{
		$request->validate([
			'name' => ['required', 'string', 'max:100'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'sdt'=>['required','regex:/^([0-9\s\-\+\(\)]*)$/','digits:10','min:10'],
			'password' => ['required', 'min:4', 'confirmed'],
		]);
		$orm = new NguoiDung();
		$orm->name = $request->name;
		$orm->username = Str::before($request->email, '@');
		$orm->email = $request->email;
		$orm->sdt = $request->sdt;
		$orm->password = Hash::make($request->password);
		$orm->role = $request->role;
		$orm->save();
		return redirect()->route('nguoidung');
	}
	public function getSua($id)
	{
		$nguoidung = NguoiDung::find($id);
		return view('nguoidung.sua', ['nguoidung' => $nguoidung]);
	}
	public function postSua(Request $request)
	{
		$request->validate([
			'name' => ['required', 'string', 'max:100'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:nguoidung,email,' . $request->id],
			'sdt'=>['required','regex:/^([0-9\s\-\+\(\)]*)$/','digits:10','min:10'],
			'password' => ['confirmed'],
		]);
		$orm = NguoiDung::find($request->id);
		$orm->name = $request->name;
		$orm->username = Str::before($request->email, '@');
		$orm->email = $request->email;
		$orm->sdt = $request->sdt;
		/* $orm->role = $request->role; */
		$orm
			->roles()
			->detach();
		$orm
			->roles()
			->attach(Role::where('name', $request->role)->first());
		if(!empty($request->password)) $orm->password = Hash::make($request->password);
		$orm->save();
		return redirect()->route('nguoidung');
	}
	public function getXoa($id)
	{
		$orm = NguoiDung::find($id);
		$orm->delete();
		return redirect()->route('nguoidung');
	}
}