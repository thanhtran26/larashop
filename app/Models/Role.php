<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NguoiDung;

class Role extends Model
{
    use HasFactory;
	public function NguoiDung()
	{
		return $this->belongsToMany(NguoiDung::class);
	}
}
