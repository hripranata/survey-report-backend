<?php

namespace App\Exports;

use App\Models\Loading;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;    
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;

class LoadingsExport implements FromCollection,WithHeadings,WithMapping
{
    use Exportable;
    protected $start;
    protected $end;
    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function collection()
    {
        return Loading::with('tongkang')->whereBetween('lo_date', [$this->start, $this->end])->orderBy('stop', 'asc')->get();
    }

    public function map($data): array
    {
        return[
        $data->id,
        $data->tongkang->vessel_name,
        $data->lo_date,
        $data->bbm,
        $data->vol_lo,
        $data->surveyor,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tongkang',
            'LO Date',
            'BBM',
            'Vol LO',
            'Surveyor',
        ];
    }
}
