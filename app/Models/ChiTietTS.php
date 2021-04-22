<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietTS extends Model
{
    use HasFactory;
	
	protected $table = 'chitietts';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	protected $fillable = [
		'ts',
		'id_thongso',
		'id_sanpham',
		
	];
	public function ThongSo()

	{
		return $this->belongsTo('App\Models\ThongSo', 'id_thongso', 'id');
	}
	public function SanPham()

	{
		return $this->belongsTo('App\Models\SanPham', 'id_sanpham', 'id');
	}
}
