<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;
	
	protected $table = 'loaisanpham';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	public function SanPham()

	{
		return $this->hasMany('App\Models\SanPham', 'loaisanpham_id', 'id');
	}
	public function ThongSo()

	{
		return $this->hasMany('App\Models\ThongSo', 'id_loaisanpham', 'id');
	}
}
