<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Product;
use App\Models\AccountingTransaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Exports\TransactionsExport;

class ReportController extends Controller
{

    public function index()
    {
        
        return view('admin.reports.index');
    }

    // Month-end Sales Report
    public function salesReport(Request $request)
    {
        $month = $request->input('month', Carbon::now()->format('Y-m'));
        $sales = Product::whereMonth('created_at', Carbon::parse($month)->month)
                        ->whereYear('created_at', Carbon::parse($month)->year)
                        ->get();
                        
        return view('admin.reports.sales', compact('sales', 'month'));
    }

    // Month-end Service Report
    public function serviceReport(Request $request)
    {
        $month = $request->input('month', Carbon::now()->format('Y-m'));
        $services = Appointment::whereMonth('created_at', Carbon::parse($month)->month)
                               ->whereYear('created_at', Carbon::parse($month)->year)
                               ->get();

        return view('admin.reports.services', compact('services', 'month'));
    }

    // Accounting Summary
    public function accountingReport()
    {
        $income = AccountingTransaction::where('type', 'income')->sum('amount');
        $expenses = AccountingTransaction::where('type', 'expense')->sum('amount');
        $profit = $income - $expenses;

        return view('admin.reports.accounting', compact('income', 'expenses', 'profit'));
    }

    // Download Report (CSV/Excel/PDF)
    public function downloadReport($type)
    {
        $data = AccountingTransaction::all();

        if ($type == 'csv' || $type == 'excel') {
            return Excel::download(new TransactionsExport, "report.$type");
        } elseif ($type == 'pdf') {
            $pdf = PDF::loadView('admin.reports.pdf', compact('data'));
            return $pdf->download('report.pdf');
        }

        return back()->with('error', 'Invalid format');
    }
}
