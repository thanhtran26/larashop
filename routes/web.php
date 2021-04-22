<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\DonHangChiTietController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\HangController;
use App\Http\Controllers\ThongSoController;
use App\Http\Controllers\ChiTietTSController;
use App\Http\Controllers\LienHeController;
use App\Http\Controllers\SlideController;



Auth::routes();

Route::get('/', [HomeController::class, 'getHome'])->name('frontend');
Route::get('/dang-nhap', [HomeController::class, 'getDangNhap'])->name('frontend.dangnhap');
Route::get('/dang-ky', [HomeController::class, 'getDangKy'])->name('frontend.dangky');
Route::get('/gioi-thieu', [HomeController::class, 'getGioiThieu'])->name('frontend.gioithieu');
//Trang loại sản phẩm
Route::get('/hang/{hxs}', [HomeController::class, 'getHang'])->name('frontend.hang');
Route::get('/sanpham/{loai}', [HomeController::class, 'getLoaiSanPham'])->name('frontend.loaisanpham');


// Trang sản phẩm
Route::get('/sanpham', [HomeController::class, 'getSanPham'])->name('frontend.sanpham');
Route::post('/sanpham', [HomeController::class, 'postSanPham'])->name('frontend.sanpham');
Route::get('/sanpham/{tenloai_slug}/{tensanpham_slug}', [HomeController::class, 'getSanPham_ChiTiet'])->name('frontend.sanpham.chitiet');
// Trang giỏ hàng
Route::get('/gio-hang', [HomeController::class, 'getGioHang'])->name('frontend.giohang');
Route::get('/gio-hang/them/{tensanpham_slug}', [HomeController::class, 'getGioHang_Them'])->name('frontend.giohang.them');
Route::get('/gio-hang/xoa', [HomeController::class, 'getGioHang_XoaTatCa'])->name('frontend.giohang.xoatatca');
Route::get('/gio-hang/xoa/{row_id}', [HomeController::class, 'getGioHang_Xoa'])->name('frontend.giohang.xoa');
Route::get('/gio-hang/giam/{row_id}', [HomeController::class, 'getGioHang_Giam'])->name('frontend.giohang.giam');
Route::get('/gio-hang/tang/{row_id}', [HomeController::class, 'getGioHang_Tang'])->name('frontend.giohang.tang');
// Trang đặt hàng
Route::get('/dat-hang', [HomeController::class, 'getDatHang'])->name('frontend.dathang');
Route::post('/dat-hang', [HomeController::class, 'postDatHang'])->name('frontend.dathang');
Route::get('/dat-hang-thanh-cong', [HomeController::class, 'getDatHangThanhCong'])->name('frontend.dathangthanhcong');
// Liên hệ
Route::get('/lien-he', [LienHeController::class, 'getLienHe'])->name('frontend.lienhe');
Route::post('/lien-he', [LienHeController::class, 'postLienHe'])->name('frontend.lienhe');
// Tìm kiếm 
Route::get('/tim-kiem', [HomeController::class, 'getTimKiem'])->name('frontend.timkiem');
//đổi trả 
Route::get('/doi-tra', [HomeController::class, 'getDoiTra'])->name('frontend.doitra');
// Trang khách hàng
Route::get('/khach-hang/dang-ky', [HomeController::class, 'getDangKy'])->name('khachhang.dangky');
Route::get('/khach-hang/dang-nhap', [HomeController::class, 'getDangNhap'])->name('khachhang.dangnhap');
// Trang tài khoản khách hàng
Route::prefix('khach-hang')->middleware('auth')->group(function() {
	// Trang chủ tài khoản khách hàng
	Route::get('/', [KhachHangController::class, 'getHome'])->name('khachhang');
	// Xem và cập nhật trạng thái đơn hàng
	Route::get('/don-hang/{id}', [KhachHangController::class, 'getDonHang'])->name('frontend.donhang');
	Route::post('/don-hang/{id}', [KhachHangController::class, 'postDonHang'])->name('frontend.donhang');
	// Cập nhật thông tin tài khoản
	Route::post('/cap-nhat-ho-so', [KhachHangController::class, 'postCapNhatHoSo'])->name('khachhang.capnhathoso');
});

// Trang tài khoản quản lý
Route::prefix('admin') ->middleware('auth') ->group(function() {
	// Trang chủ tài khoản quản lý
	Route::get('/', [AdminController::class, 'getAdmin'])->name('admin');
	// Quản lý Loại sản phẩm
	Route::get('/loaisanpham', [LoaiSanPhamController::class, 'getDanhSach'])->name('loaisanpham');
	Route::get('/loaisanpham/them', [LoaiSanPhamController::class, 'getThem'])->name('loaisanpham.them');
	Route::post('/loaisanpham/them', [LoaiSanPhamController::class, 'postThem'])->name('loaisanpham.them');
	Route::get('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'getSua'])->name('loaisanpham.sua');
	Route::post('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'postSua'])->name('loaisanpham.sua');
	Route::get('/loaisanpham/xoa/{id}', [LoaiSanPhamController::class, 'getXoa'])->name('loaisanpham.xoa');
	// Quản lý ChiTietTSController
	Route::get('/chitietts', [ChiTietTSController::class, 'getDanhSach'])->name('chitietts');
		Route::post('/chitietts/nhap', [ChiTietTSController::class, 'postNhap'])->name('chitietts.nhap');
	Route::get('/chitietts/xuat', [ChiTietTSController::class, 'getXuat'])->name('chitietts.xuat');
	// Quản lý TohngSo
	Route::get('/thongso', [ThongSoController::class, 'getDanhSach'])->name('thongso');
		Route::post('/thongso/nhap', [ThongSoController::class, 'postNhap'])->name('thongso.nhap');
	Route::get('/thongso/xuat', [ThongSoController::class, 'getXuat'])->name('thongso.xuat');
	// Quản lý Hãng
	Route::get('/hang', [HangController::class, 'getDanhSach'])->name('hang');
	Route::get('/hang/them', [HangController::class, 'getThem'])->name('hang.them');
	Route::post('/hang/them', [HangController::class, 'postThem'])->name('hang.them');
	Route::get('/hang/sua/{id}', [HangController::class, 'getSua'])->name('hang.sua');
	Route::post('/hang/sua/{id}', [HangController::class, 'postSua'])->name('hang.sua');
	Route::get('/hang/xoa/{id}', [HangController::class, 'getXoa'])->name('hang.xoa');
		Route::post('/hang/nhap', [HangController::class, 'postNhap'])->name('hang.nhap');
	Route::get('/hang/xuat', [HangController	::class, 'getXuat'])->name('hang.xuat');
	// Quản lý Sản phẩm
	Route::get('/sanpham', [SanPhamController::class, 'getDanhSach'])->name('sanpham');
	Route::get('/sanpham/them', [SanPhamController::class, 'getThem'])->name('sanpham.them');
	Route::post('/sanpham/them', [SanPhamController::class, 'postThem'])->name('sanpham.them');
	Route::get('/sanpham/sua/{id}', [SanPhamController::class, 'getSua'])->name('sanpham.sua');
	Route::post('/sanpham/sua/{id}', [SanPhamController::class, 'postSua'])->name('sanpham.sua');
	Route::get('/sanpham/xoa/{id}', [SanPhamController::class, 'getXoa'])->name('sanpham.xoa');
	Route::post('/sanpham/nhap', [SanPhamController::class, 'postNhap'])->name('sanpham.nhap');
	Route::get('/sanpham/xuat', [SanPhamController	::class, 'getXuat'])->name('sanpham.xuat');
	//slide
	Route::get('/slide', [SlideController::class, 'getDanhSach'])->name('slide');
	Route::get('/slide/them', [SlideController::class, 'getThem'])->name('slide.them');
	Route::post('/slide/them', [SlideController::class, 'postThem'])->name('slide.them');
		Route::get('/slide/sua/{id}', [SlideController::class, 'getSua'])->name('slide.sua');
	Route::post('/slide/sua/{id}', [SlideController::class, 'postSua'])->name('slide.sua');
	Route::get('/slide/xoa/{id}', [SlideController::class, 'getXoa'])->name('slide.xoa');
	Route::post('/slide/nhap', [SlideController::class, 'postNhap'])->name('slide.nhap');
	Route::get('/slide/xuat', [SlideController	::class, 'getXuat'])->name('slide.xuat');
	// Quản lý Đơn hàng
	Route::get('/donhang', [DonHangController::class, 'getDanhSach'])->name('donhang');
	Route::get('/donhang/them', [DonHangController::class, 'getThem'])->name('donhang.them');
	Route::post('/donhang/them', [DonHangController::class, 'postThem'])->name('donhang.them');

	Route::get('/donhang/sua/{id}', [DonHangController::class, 'getSua'])->name('donhang.sua');
	Route::post('/donhang/sua/{id}', [DonHangController::class, 'postSua'])->name('donhang.sua');
	Route::get('/donhang/xoa/{id}', [DonHangController::class, 'getXoa'])->name('donhang.xoa');
	// Quản lý Đơn hàng chi tiết
	Route::get('/donhang/chitiet', [DonHangChiTietController::class, 'getDanhSach'])->name('donhang.chitiet');
	Route::get('/donhang/chitiet/sua/{id}', [DonHangChiTietController::class, 'getSua'])->name('donhang.chitiet.sua');
	Route::post('/donhang/chitiet/sua/{id}', [DonHangChiTietController::class, 'postSua'])->name('donhang.chitiet.sua');
	Route::get('/donhang/chitiet/xoa/{id}', [DonHangChiTietController::class, 'getXoa'])->name('donhang.chitiet.xoa');
	// Quản lý Tài khoản người dùng
	Route::get('/nguoidung', [NguoiDungController::class, 'getDanhSach'])->name('nguoidung');
	Route::get('/nguoidung/them', [NguoiDungController::class, 'getThem'])->name('nguoidung.them');
	Route::post('/nguoidung/them', [NguoiDungController::class, 'postThem'])->name('nguoidung.them');
	Route::get('/nguoidung/sua/{id}', [NguoiDungController::class, 'getSua'])->name('nguoidung.sua');
	Route::post('/nguoidung/sua/{id}', [NguoiDungController::class, 'postSua'])->name('nguoidung.sua');
	Route::get('/nguoidung/xoa/{id}', [NguoiDungController::class, 'getXoa'])->name('nguoidung.xoa');
});


// Google OAuth
Route::get('/login/google', [HomeController::class, 'getGoogleLogin'])->name('google.login');
Route::get('/login/google/callback', [HomeController::class, 'getGoogleCallback'])->name('google.callback');