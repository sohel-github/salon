<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AccountingTransaction;
use App\Models\Product;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function salesReport(Request $request)
    {
        $month = $request->input('month', Carbon::now()->format('Y-m'));
        $sales = Product::whereMonth('created_at', Carbon::parse($month)->month)
                        ->whereYear('created_at', Carbon::parse($month)->year)
                        ->get();
        return response()->json($sales);
    }

    public function serviceReport(Request $request)
    {
        $month = $request->input('month', Carbon::now()->format('Y-m'));
        $services = Appointment::whereMonth('created_at', Carbon::parse($month)->month)
                               ->whereYear('created_at', Carbon::parse($month)->year)
                               ->get();
        return response()->json($services);
    }

    public function accountingReport()
    {
        $income = AccountingTransaction::where('type', 'income')->sum('amount');
        $expenses = AccountingTransaction::where('type', 'expense')->sum('amount');
        $profit = $income - $expenses;

        return response()->json(['income' => $income, 'expenses' => $expenses, 'profit' => $profit]);
    }
}
