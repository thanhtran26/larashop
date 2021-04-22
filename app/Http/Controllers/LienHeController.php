<?php

namespace App\Http\Controllers;
use App\Models\NguoiDung;
use App\Models\LienHe;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use File;
class LienHeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function getDanhSach(Request $request)
	{
		$request->user()->authorizeRoles(['saler', 'admin']);
		$lienhe = LienHe::all();
		return view('lienhe.danhsach', compact('lienhe'));
	}
	public function getXoa($id)
	{
		$orm = lienhe::find($id);
		$orm->delete();
		Storage::delete($orm->hinhanh);
		return redirect()->route('lienhe');
	}
	public function getLienHe()
	{
		return view('frontend.lienhe');
	}
	public function postLienHe(Request $request)
	{
		$data = $request->except('_token');
		$data['created_at']=$data['updated_at']=Carbon::now('Asia/Ho_Chi_Minh');
		LienHe::insert($data);
		return redirect()->back();
		
	}
}
