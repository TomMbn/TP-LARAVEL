<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Contract;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::with('contract')->whereNull('payment_date')->get();
        return view('bills.index', compact('bills'));
    }

    public function markAsPaid(Request $request, Bill $bill)
    {
        $bill->update(['payment_date' => now()]);
        return redirect()->route('bills.index')->with('success', 'Bill marked as paid successfully!');
    }
}
