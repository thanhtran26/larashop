<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use App\Models\Hang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Imports\HangImport;
use Excel;
class HangController extends Controller
{
	public function getDanhSach(Request $request)
	{
		$request->user()->authorizeRoles(['saler', 'admin']);
		$hang = Hang::all();
		return view('hang.danhsach', compact('hang'));
	}
	public function getThem()
	{
		return view('hang.them');
	}
	public function postThem(Request $request)
	{
		$this->validate($request, [
			'tenhang' => ['required', 'max:255'],
		]);

		$orm = new Hang();
		$orm->tenhang = $request->tenhang;
		$orm->tenhang_slug = Str::slug($request->tenhang, '-');
		if($request->hasFile('hinhanh'))
		{
			// Tạo thư mục nếu chưa có
			
			// Xác định tên tập tin
			$extension = $request->file('hinhanh')->extension();
			$newfilename = Str::slug($request->tenhang, '-') . '.' . $extension;
			// Upload vào thư mục và trả về đường dẫn
			$path = Storage::putFileAs('logo', $request->file('hinhanh'), $newfilename);
		}
		$orm->hinhanh = $path;
		
		$orm->save();
		return redirect()->route('hang');
	}
	public function getSua($id)
	{
		$hang = Hang::find($id);
		return view('hang.sua', compact('hang'));
	}
	public function postSua(Request $request, $id)
	{
		if($request->hasFile('hinhanh'))
		{
			// Xóa tập tin cũ
			$hang = Hang::find($id);
			Storage::delete($hang->hinhanh);
			// Xác định tên tập tin mới
			$extension = $request->file('hinhanh')->extension();
			$newfilename = Str::slug($request->tenhang, '-') . '.' . $extension;
			// Upload vào thư mục và trả về đường dẫn
			$path = Storage::putFileAs('logo', $request->file('hinhanh'), $newfilename);
		}
		$this->validate($request, [
			'tenhang' => ['required', 'max:255'],
		]);
		$orm = Hang::find($id);
		$orm->tenhang = $request->tenhang;
		$orm->tenhang_slug = Str::slug($request->tenhang, '-');
		if($request->hasFile('hinhanh')) $orm->hinhanh = $request->hinhanh;
		$orm->save();
		return redirect()->route('hang');
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
		Excel::import(new HangImport, $request->file('file_excel'));

		return redirect()->route('hang');
	}
}
