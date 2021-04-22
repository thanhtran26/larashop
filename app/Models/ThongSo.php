<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongSo extends Model
{
    use HasFactory;
	
	protected $table = 'thongso';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	protected $fillable = [
		'tenthongso',
		'id_loaisanpham',
		
	];
	public function LoaiSanPham()

	{
		return $this->belongsTo('App\Models\LoaiSanPham', 'id_loaisanpham', 'id');
	}
	public function ChiTietTS()
	{
		return $this->hasMany('App\Models\ChiTietTS', 'id_thongso', 'id');
	}
	
}
