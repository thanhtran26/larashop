<?php

namespace App\Imports;

use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class SanPhamImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SanPham([
			'loaisanpham_id' => $row['loaisanpham_id'],
			'tensanpham' => $row['tensanpham'],
			'tensanpham_slug' => $row['tensanpham_slug'],
			'id_hang' => $row['id_hang'],
			'soluong' => $row['soluong'],
			'dongia' => $row['dongia'],
			'khuyenmai' => $row['khuyenmai'],
			'dongia_km' => $row['dongia_km'],
			'baohanh' => $row['baohanh'],
			'thongtinsanpham'=>$row['thongtinsanpham'],
			'hinhanh' => $row['hinhanh'],
			
        ]);
    }
}
