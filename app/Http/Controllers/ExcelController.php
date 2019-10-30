<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function importExportView()
    {
        return view('import');
    }

    public function export()
    {
        return Excel::download(new EmployeeExport, 'Employee.xlsx');
    }

    public function import()
    {
        Excel::import(new EmployeeImport,request()->file('file'));

        return back();
    }
}
