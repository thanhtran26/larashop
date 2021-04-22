<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
	protected $table = 'donhang';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	public function NguoiDung()
	{
		return $this->belongsTo('App\Models\NguoiDung', 'nguoidung_id', 'id');
	}
	public function DonHang_ChiTiet()
	{
		return $this->hasMany('App\Models\DonHang_ChiTiet', 'donhang_id', 'id');
	}
}
