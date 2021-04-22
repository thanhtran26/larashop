<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
	protected $table = 'sanpham';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	protected $fillable = [
		'loaisanpham_id',
		'tensanpham',
		'tensanpham_slug',
		'id_hang',
		'soluong',
		'dongia',
		'khuyenmai',
		'dongia_km',
		'baohanh',
		'thongtinsanpham',
		'hinhanh',
		
	];
	public function LoaiSanPham()
	{
		return $this->belongsTo('App\Models\LoaiSanPham', 'loaisanpham_id', 'id');
	}
	public function Hang()
	{
		return $this->belongsTo('App\Models\Hang', 'id_hang', 'id');
	}
	public function DonHang_ChiTiet()
	{
		return $this->hasMany('App\Models\DonHang_ChiTiet', 'sanpham_id', 'id');
	}
	public function ChiTietTS()
	{
		return $this->hasMany('App\Models\ChiTietTS', 'id_sanpham', 'id');
	}
}
