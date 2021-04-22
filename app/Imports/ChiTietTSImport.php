<?php

namespace App\Imports;
use App\Models\ChiTietTS;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ChiTietTSImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ChiTietTS([
			'ts' => $row['ts'],
			'id_thongso' => $row['id_thongso'],
			'id_sanpham' => $row['id_sanpham'],

			
        ]);
    }
}
