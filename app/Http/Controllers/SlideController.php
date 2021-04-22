<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use App\Models\Slide;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Imports\SlideImport;
use Excel;
class SlideController extends Controller
{
	public function getDanhSach(Request $request)
	{
		$request->user()->authorizeRoles(['saler', 'admin']);
		$slide = Slide::all();
		return view('slide.danhsach', compact('slide'));
	}
	
	public function getSua($id)
	{
		$slide = Slide::find($id);
		return view('slide.sua', compact('slide'));
	}
	public function postSua(Request $request, $id)
	{
			
			
		$path = Storage::putFile('Slide', new File('/app/Slide/'));
		$this->validate($request, [
			'link' => ['required', 'max:255'],
		]);
		$orm = Slide::find($id);
		$orm->link = $request->link;
		$orm->hinhanh = $path;
		$orm->save();
		return redirect()->route('slide');
	}
	public function getXoa($id)
	{
		$orm = Slide::find($id);
		Storage::delete($orm->hinhanh);
		$orm->delete();
		return redirect()->route('slide');
	}
	public function postNhap(Request $request)
	{
		Excel::import(new SlideImport, $request->file('file_excel'));

		return redirect()->route('slide');
	}
}
