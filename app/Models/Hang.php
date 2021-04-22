<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hang extends Model
{
    use HasFactory;
	
	protected $table = 'hang';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	protected $fillable = [
		'tenhang',
		'tenhang_slug',
		'hinhanh',
		
	];
	public function SanPham()

	{
		return $this->hasMany('App\Models\SanPham', 'id_hang', 'id');
	}
}
