<?php

namespace App\Imports;

use App\Models\Slide;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class SlideImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Slide([
			'link' => $row['link'],
			'hinhanh' => $row['hinhanh'],
			
        ]);
    }
}
