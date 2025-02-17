<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TaxController extends Controller
{
    public function index()
    {
        return view('tax.index');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'tax_regime' => 'required|in:micro-foncier,réel',
        ]);

        $user = Auth::user();
        $taxRegime = $request->tax_regime;
        $currentYear = Carbon::now()->year;
        $totalIncome = 0;
        $taxableIncome = 0;
        $declarationCase = '';
        $message = '';

        $bills = $user->bills()->whereYear('payment_date', $currentYear)->get();

        foreach ($bills as $bill) {
            $totalIncome += $bill->amount;
        }

        if ($taxRegime == 'micro-foncier' && $totalIncome > 15000) {
            $taxRegime = 'réel';
            $message = 'Vous ne pouvez pas être au régime micro-foncier car vos revenus sont supérieurs à 15 000 €. Le régime réel a été appliqué.';
        }

        if ($taxRegime == 'micro-foncier') {
            $taxableIncome = $totalIncome * 0.70; // 30% abattement
            $declarationCase = '4 BE (déclaration n°2042)';
        } elseif ($taxRegime == 'réel') {
            $taxableIncome = $totalIncome; // 100% des revenus
            $declarationCase = '4 BA (déclaration n°2044)';
        }

        return view('tax.result', compact('totalIncome', 'taxableIncome', 'declarationCase', 'message'));
    }
}