<?php

namespace App\Imports;

use App\Models\Hang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class HangImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Hang([
			'tenhang' => $row['tenhang'],
			'tenhang_slug' => $row['tenhang_slug'],
			'hinhanh' => $row['hinhanh'],
			
        ]);
    }
}
