<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\Hang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Imports\SanPhamImport;
use App\Exports\SanPhamExport;

use File;
use Excel;


class SanPhamController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function getDanhSach( Request $request)
	{
		$request->user()->authorizeRoles(['saler', 'admin']);
		$sanpham = SanPham::all();
		return view('sanpham.danhsach', compact('sanpham'));
	}
	public function getThem()
	{
		$loaisanpham = LoaiSanPham::all();
		$hang = Hang::all();
		return view('sanpham.them', compact('loaisanpham','hang'));
	}
		
	public function postThem(Request $request)
	{
		
		$this->validate($request, [
			'tensanpham' => ['required', 'max:255'],
			
			'soluong' => ['required', 'numeric'],
			'dongia' => ['required', 'numeric','min:100000'],
			'khuyenmai' => ['required', 'numeric'],
			'dongia_km' => ['required', 'numeric','min:100000'],
			
		]);
		$orm = new SanPham();
		$orm->tensanpham = $request->tensanpham;
		$orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
		$orm->loaisanpham_id = $request->loaisanpham_id;
		$orm->id_hang = $request->id_hang;
		$orm->soluong = $request->soluong;
		$orm->dongia = $request->dongia;
		$orm->khuyenmai = $request->khuyenmai;
		$orm->dongia_km = $request->dongia_km;
		$orm->baohanh = $request->baohanh;
		$orm->thongtinsanpham = $request->thongtinsanpham;
		if($request->hasFile('hinhanh'))
		{
			// Tạo thư mục nếu chưa có
			$lsp = LoaiSanPham::find($request->loaisanpham_id);
			File::isDirectory($lsp->tenloai_slug) or Storage::makeDirectory($lsp->tenloai_slug, 0775);
			// Xác định tên tập tin
			$extension = $request->file('hinhanh')->extension();
			$newfilename = Str::slug($request->tensanpham, '-') . '.' . $extension;
			// Upload vào thư mục và trả về đường dẫn
			$path = Storage::putFileAs($lsp->tenloai_slug, $request->file('hinhanh'), $newfilename);
		}
		$orm->hinhanh = $path;
		
		$orm->save();
		return redirect()->route('sanpham');
	}
	public function getSua($id)
	{
		$sanpham = SanPham::find($id);
		$loaisanpham = LoaiSanPham::all();
		$hang = Hang::all();
		return view('sanpham.sua', compact('sanpham', 'loaisanpham','hang'));
	}
	public function postSua(Request $request, $id)
	{
		if($request->hasFile('hinhanh'))
		{
			// Xóa tập tin cũ
			$sp = SanPham::find($id);
			Storage::delete($sp->hinhanh);
			// Xác định tên tập tin mới
			$extension = $request->file('hinhanh')->extension();
			$newfilename = Str::slug($request->tensanpham, '-') . '.' . $extension;
			// Upload vào thư mục và trả về đường dẫn
			$lsp = LoaiSanPham::find($request->loaisanpham_id);
			$path = Storage::putFileAs($lsp->tenloai_slug, $request->file('hinhanh'), $newfilename);
		}
		$this->validate($request, [
			'tensanpham' => ['required', 'max:255'],
			
			'soluong' => ['required', 'numeric'],
			'dongia' => ['required', 'numeric','min:100000'],
			'khuyenmai' => ['required', 'numeric','max:1'],
			'dongia_km' => ['required', 'numeric','min:100000'],
		]);
		
		$orm = SanPham::find($id);
		$orm->tensanpham = $request->tensanpham;
		$orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
		$orm->loaisanpham_id = $request->loaisanpham_id;
		$orm->id_hang = $request->id_hang;
		$orm->soluong = $request->soluong;
		$orm->dongia = $request->dongia;
		$orm->khuyenmai = $request->khuyenmai;
		$orm->dongia_km = $request->dongia_km;
		$orm->baohanh = $request->baohanh;
		$orm->thongtinsanpham = $request->thongtinsanpham;
		if($request->hasFile('hinhanh')) $orm->hinhanh = $request->hinhanh;
		$orm->save();
		return redirect()->route('sanpham');
	}
	public function getXoa($id)
	{
		$orm = SanPham::find($id);
		$orm->delete();
		Storage::delete($orm->hinhanh);
		return redirect()->route('sanpham');
	}
	
	// Nhập từ Excel

	public function postNhap(Request $request)
	{
		Excel::import(new SanPhamImport, $request->file('file_excel'));

		return redirect()->route('sanpham');
	}

	// Xuất ra Excel
	public function getXuat()
	{
		return Excel::download(new SanPhamExport, 'danh-sach-sanpham.xlsx');
	}
}
