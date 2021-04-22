<?php

namespace App\Http\Controllers;
use App\Models\NguoiDung;
use App\Models\SanPham;
use App\Models\DonHang_ChiTiet;
use Illuminate\Http\Request;

class DonHangChiTietController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function getDanhSach()
	{
		$request->user()->authorizeRoles(['saler', 'admin']);
		$donhang_chitiet = DonHang_ChiTiet::all();
		return view('donhangchitiet.danhsach', compact('donhang_chitiet'));
	}
	public function getThem()
	{
		return view('donhang_chitiet.them');
	}
	public function postThem(Request $request)
	{
		$orm = new DonHang_ChiTiet();
		$orm->donhang_id = $request->donhang_id;
		$orm->sanpham_id = $request->sanpham_id;
		$orm->soluongban = $request->soluongban;
		$orm->dongiaban = $request->dongiaban;
		$orm->save();
		return redirect()->route('donhang_chitiet');
	}
	public function getSua($id)
	{
		$donhang_chitiet = DonHang_ChiTiet::find($id);
		return view('donhang_chitiet.sua', compact('donhang_chitiet'));
	}
	public function postSua(Request $request, $id)
	{
		$orm = DonHang_ChiTiet::find($id);
		$orm->donhang_id = $request->donhang_id;
		$orm->sanpham_id = $request->sanpham_id;
		$orm->soluongban = $request->soluongban;
		$orm->dongiaban = $request->dongiaban;
		$orm->save();
		return redirect()->route('donhang_chitiet');
	}
	public function getXoa($id)
	{
		$orm = DonHang_ChiTiet::find($id);
		$orm->delete();
		return redirect()->route('donhang_chitiet');
	}
}
