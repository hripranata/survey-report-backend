<?php

namespace App\Exports;

use App\Models\Bunker;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;    
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;

class BunkersExport implements FromCollection,WithHeadings,WithMapping
{
    use Exportable;
    protected $month;
    protected $year;
    public function __construct($month, $year)
    {
        $this->month = $month;
        $this->year = $year;
    }
    public function collection()
    {
        return Bunker::with('tongkang')->whereYear('bunkers.stop', $this->year)->whereMonth('bunkers.stop', $this->month)->get();
    }

    public function map($data): array
    {
        return[
        $data->id,
        $data->tongkang->vessel_name,
        $data->kri->vessel_name,
        $data->bbm,
        $data->vol_lo,
        $data->vol_ar,
        $data->surveyor,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tongkang',
            'KRI',
            'BBM',
            'Vol LO',
            'Vol AR',
            'Surveyor',
        ];
    }
}
