<?php

namespace App\Imports;

use App\Models\ThongSo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ThongSoImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ThongSo([
			'tenthongso' => $row['tenthongso'],
			'id_loaisanpham' => $row['id_loaisanpham'],
			
        ]);
    }
}
