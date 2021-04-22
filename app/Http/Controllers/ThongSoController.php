<?php

namespace App\Http\Controllers;

use App\Models\ThongSo;
use App\Models\LoaiSanPham;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Imports\ThongSoImport;
use Excel;
class ThongSoController extends Controller
{
	public function getDanhSach(Request $request)
	{
		$request->user()->authorizeRoles(['saler', 'admin']);
		$thongso = ThongSo::all();
		return view('thongso.danhsach', compact('thongso'));
	}
	
	
	public function getXoa($id)
	{
		$orm = Hang::find($id);
		Storage::delete($orm->hinhanh);
		$orm->delete();
		return redirect()->route('hang');
	}
	public function postNhap(Request $request)
	{
		Excel::import(new ThongSoImport, $request->file('file_excel'));

		return redirect()->route('thongso');
	}
}
