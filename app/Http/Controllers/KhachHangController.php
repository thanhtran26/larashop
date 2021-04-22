<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KhachHangController extends Controller
{
    public function __construct()
	{
		//$this->middleware('khachhang');
	}
	public function getHome()
	{
		$id = Auth::user()->id;
		$ctdh= DonHang_ChiTiet::join('donhang', 'donhang_chitiet.donhang_id', '=', 'donhang.id')
			->where('nguoidung_id', $id)
            ->get();
		
		
		return view('frontend.khachhang', compact('ctdh'));
	}
	public function getDonHang($id)
	{
		return view('frontend.khachhang_donhang');
	}
	public function postDonHang(Request $request, $id)
	{
		return redirect()->route('khachhang.donhang');
	}
	public function postCapNhatHoSo(Request $request)
	{
		$id = Auth::user()->id;
		$request->validate([
			'name' => ['required', 'string', 'max:100'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:nguoidung,email,' . $id],
			'password' => ['confirmed'],
		]);
		$orm = NguoiDung::find($id);
		$orm->name = $request->name;
		$orm->username = Str::before($request->email, '@');
		$orm->email = $request->email;
		if(!empty($request->password)) $orm->password = Hash::make($request->password);
		$orm->save();
		return redirect()->route('khachhang');
	}
}
