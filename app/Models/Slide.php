<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
	protected $table = 'slide';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	protected $fillable = [
		'link',
		'hinhanh',
		
	];
}
