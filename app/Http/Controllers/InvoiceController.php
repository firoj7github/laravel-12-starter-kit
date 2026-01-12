<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceController extends Controller
{
    public function download()
    {
        $pdf = Pdf::loadView('pdf.invoice', ['customer' => 'Firoj']);
        return $pdf->download('invoice.pdf');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
