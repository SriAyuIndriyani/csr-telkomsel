<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;


class CSRDownload implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    // }
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return new Collection($this->data);
    }

    public function headings(): array
    {
        // Menentukan header kolom
        return [
            'Nama',
            'Jabatan',
            'Type',
            'Hostname',
            'SSD',
            'Winver',
            'Processor',
            'Antivirus',
            'RAM',
            'Lokasi'
        ];
    }
}
