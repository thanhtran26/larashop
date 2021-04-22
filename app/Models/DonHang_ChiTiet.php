<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang_ChiTiet extends Model
{
    use HasFactory;
	protected $table = 'donhang_chitiet';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	public function DonHang()
	{
		return $this->belongsTo('App\Models\DonHang', 'donhang_id', 'id');
	}
	public function SanPham()
	{
		return $this->belongsTo('App\Models\SanPham', 'sanpham_id', 'id');
	}
}
