<?php

namespace App\Http\Controllers;

use App\Models\ChiTietTS;
use App\Models\LoaiSanPham;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Imports\ChiTietTSImport;
use Excel;
class ChiTietTSController extends Controller
{
	public function getDanhSach(Request $request)
	{
		$request->user()->authorizeRoles(['saler', 'admin']);
		$chitietts = ChiTietTS::all();
		return view('chitietts.danhsach', compact('chitietts'));
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
		Excel::import(new ChiTietTSImport, $request->file('file_excel'));

		return redirect()->route('chitietts');
	}
}
