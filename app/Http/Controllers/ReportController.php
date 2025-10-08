<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorrowRecord;
use PDF;

class ReportController extends Controller
{
    public function borrowReport()
    {
        $records = BorrowRecord::with('student', 'equipment')->get();
        $pdf = PDF::loadView('reports.borrow', compact('records'));
        return $pdf->download('borrow_report.pdf');
    }
}
