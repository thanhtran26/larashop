<?php

namespace App\Exports;

use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;


class SanPhamExport implements FromCollection,
							WithHeadings,
							WithCustomStartCell,
							WithMapping
{
	public function headings(): array
	{
		return [
			'loaisanpham_id',
			'tensanpham',
			'tensanpham_slug',
			'id_hang',
			'soluong',
			'dongia',
			'khuyenmai',
			'dongia_km',
			'baohanh',
			'thongtinsanpham'
			'hinhanh',
		];
	}

	public function map($row): array
	{
		return [
			$row->loaisanpham_id,
			$row->tensanpham,
			$row->tensanpham_slug,
			$row->hang,
			$row->soluong,
			$row->dongia,
			$row->khuyenmai,
			$row->dongia_km,
			$row->baohanh,
			$row->thongtinsanpham,
			$row->hinhanh,
		];
	}

	public function startCell(): string
	{
		return 'A1';
	}

	
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SanPham::all();
    }
}
