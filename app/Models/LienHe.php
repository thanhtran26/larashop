<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    use HasFactory;
	protected $table = 'lienhe';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	protected $fillable = [
		'hovaten',
		'mail',
		'vande',
		'tinnhan',
		
	];
}
