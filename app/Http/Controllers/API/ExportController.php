<?php

namespace App\Http\Controllers\API;

use App\Exports\BunkersExport;
use Illuminate\Http\Request;
use App\Exports\LoadingsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends BaseController
{
    public function export_loading($start, $end) 
    {
        return Excel::download(new LoadingsExport($start, $end), 'loadings.xlsx');
    }
    public function export_bunker($start, $end) 
    {
        return Excel::download(new BunkersExport($start, $end), 'bunkers.xlsx');
    }
}
