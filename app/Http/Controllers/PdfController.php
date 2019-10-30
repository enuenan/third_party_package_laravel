<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use PDF;

class PdfController extends Controller
{
    public function pdfview()
    {
      $data = Employee::all();
      return view('list',['data' => $data]);
    }
    public function export_pdf()
    {
        // $data = new Employee;
        $data = Employee::all();
        $pdf = PDF::loadView('pdf',compact('data'));
        // $pdf->save(storage_path().'_filename.pdf');
        return $pdf->download('employees.pdf');
    }

}
