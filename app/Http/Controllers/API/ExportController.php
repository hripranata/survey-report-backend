<?php

namespace App\Http\Controllers\API;

use App\Exports\BunkersExport;
use Illuminate\Http\Request;
use App\Exports\LoadingsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends BaseController
{
    public function export_loading($month, $year) 
    {
        return Excel::download(new LoadingsExport($month, $year), 'loadings.xlsx');
    }
    public function export_bunker($month, $year) 
    {
        return Excel::download(new BunkersExport($month, $year), 'bunkers.xlsx');
    }
}
