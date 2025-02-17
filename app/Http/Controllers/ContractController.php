<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\ContractTemplate;
use App\Models\Tenant;
use App\Models\Box;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf; // Utilisez la classe complète
use Illuminate\Support\Facades\Auth; // Assurez-vous que cette ligne est présente

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::where('user_id', auth()->id())->get();
        return view('contracts.index', compact('contracts'));
    }

    public function create()
    {
        $contractTemplates = ContractTemplate::where('user_id', auth()->id())->get();
        $tenants = Tenant::where('user_id', auth()->id())->get();
        $boxes = Box::where('user_id', auth()->id())->get()->filter(function ($box) {
            return !$box->isOccupied();
        });
        return view('contracts.create', compact('contractTemplates', 'tenants', 'boxes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'contract_template_id' => 'required|exists:contract_templates,id',
            'tenant_id' => 'required|exists:tenants,id',
            'box_id' => 'required|exists:boxes,id',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'monthly_price' => 'required|numeric',
        ]);

        $contractTemplate = ContractTemplate::find($request->contract_template_id);
        $tenant = Tenant::find($request->tenant_id);
        $box = Box::find($request->box_id);
        $user = auth()->user();
        $contract = new Contract([
            'date_end' => $request->date_end,
            'date_start' => $request->date_start,
            'monthly_price' => $request->monthly_price,
        ]);

        $content = $this->replaceVariables($contractTemplate->template, $tenant, $box, $user, $contract);

        Contract::create([
            'user_id' => auth()->id(),
            'tenant_id' => $request->tenant_id,
            'box_id' => $request->box_id,
            'contract_template_id' => $request->contract_template_id,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'monthly_price' => $request->monthly_price,
            'content' => $content,
        ]);

        return redirect()->route('contracts.index')->with('success', 'Contract created successfully!');
    }

    public function show(Contract $contract)
    {
        return view('contracts.show', compact('contract'));
    }

    public function edit(Contract $contract)
    {
        $contractTemplates = ContractTemplate::where('user_id', auth()->id())->get();
        $tenants = Tenant::where('user_id', auth()->id())->get();
        $boxes = Box::where('user_id', auth()->id())->get();
        return view('contracts.edit', compact('contract', 'contractTemplates', 'tenants', 'boxes'));
    }

    public function update(Request $request, Contract $contract)
    {
        $request->validate([
            'contract_template_id' => 'required|exists:contract_templates,id',
            'tenant_id' => 'required|exists:tenants,id',
            'box_id' => 'required|exists:boxes,id',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'monthly_price' => 'required|numeric',
        ]);

        $contractTemplate = ContractTemplate::find($request->contract_template_id);
        $tenant = Tenant::find($request->tenant_id);
        $box = Box::find($request->box_id);
        $user = auth()->user();

        $content = $this->replaceVariables($contractTemplate->template, $tenant, $box, $user, $contract);

        $contract->update([
            'tenant_id' => $request->tenant_id,
            'box_id' => $request->box_id,
            'contract_template_id' => $request->contract_template_id,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'monthly_price' => $request->monthly_price,
            'content' => $content,
        ]);

        return redirect()->route('contracts.index')->with('success', 'Contract updated successfully!');
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();

        return redirect()->route('contracts.index')->with('success', 'Contract deleted successfully!');
    }

    private function replaceVariables($template, $tenant, $box, $user, $contract)
    {
        $variables = [
            'tenant' => $tenant->toArray(),
            'box' => $box->toArray(),
            'user' => $user->toArray(),
            'contract' => $contract->toArray()
        ];

        foreach ($variables as $model => $attributes) {
            foreach ($attributes as $key => $value) {
                $template = str_replace("{{$model}_{$key}}", $value, $template);
            }
        }

        return $template;
    }

    public function exportPdf(Contract $contract)
    {
        $pdf = Pdf::loadView('contracts.pdf', compact('contract'));
        return $pdf->download('contract-' . $contract->id . '.pdf');
    }
}
