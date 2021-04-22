<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\NguoiDung;

class LoaiSanPhamController extends Controller
{
	public function getDanhSach(Request $request)
	{
		$request->user()->authorizeRoles(['saler', 'admin']);
		$loaisanpham = LoaiSanPham::all();
		return view('loaisanpham.danhsach', compact('loaisanpham'));
	}
	/* public function index(Request $request)
	{
	   
	   return view('loaisanpham.danhsach',compact('loaisanpham'));
	} */
	public function getThem()
	{
		return view('loaisanpham.them');
	}
	public function postThem(Request $request)
	{
		$this->validate($request, [
			'tenloai' => ['required', 'max:255'],
		]);

		$orm = new LoaiSanPham();
		$orm->tenloai = $request->tenloai;
		$orm->tenloai_slug = Str::slug($request->tenloai, '-');
		$orm->save();
		return redirect()->route('loaisanpham');
	}
	public function getSua($id)
	{
		$loaisanpham = LoaiSanPham::find($id);
		return view('loaisanpham.sua', compact('loaisanpham'));
	}
	public function postSua(Request $request, $id)
	{
		$this->validate($request, [
			'tenloai' => ['required', 'max:255'],
		]);
		$orm = LoaiSanPham::find($id);
		$orm->tenloai = $request->tenloai;
		$orm->tenloai_slug = Str::slug($request->tenloai, '-');
		$orm->save();
		return redirect()->route('loaisanpham');
	}
	public function getXoa($id)
	{
		$orm = LoaiSanPham::find($id);
		$orm->delete();
		return redirect()->route('loaisanpham');
	}
}
