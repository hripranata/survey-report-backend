<?php

namespace App\Exports;

use App\Models\Bunker;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;    
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\DB;

class BunkersExport implements FromCollection,WithHeadings,WithMapping
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
        return Bunker::with('tongkang')->whereBetween(DB::raw('DATE(stop)'), [$this->start, $this->end])->orderBy('stop', 'asc')->get();
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
