<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractTemplate;

class ContractTemplateController extends Controller
{
    public function index()
    {
        $contractTemplates = ContractTemplate::where('user_id', auth()->id())->get();
        return view('contract_templates.index', compact('contractTemplates'));
    }

    public function create()
    {
        return view('contract_templates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'template' => 'required|string',
        ]);

        ContractTemplate::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'template' => $request->template,
        ]);

        return redirect()->route('contract_templates.index')->with('success', 'Contract template created successfully!');
    }

    public function show(ContractTemplate $contractTemplate)
    {
        return view('contract_templates.show', compact('contractTemplate'));
    }

    public function edit(ContractTemplate $contractTemplate)
    {
        return view('contract_templates.edit', compact('contractTemplate'));
    }

    public function update(Request $request, ContractTemplate $contractTemplate)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'template' => 'required|string',
        ]);

        $contractTemplate->update($request->all());

        return redirect()->route('contract_templates.index')->with('success', 'Contract template updated successfully!');
    }

    public function destroy(ContractTemplate $contractTemplate)
    {
        $contractTemplate->delete();

        return redirect()->route('contract_templates.index')->with('success', 'Contract template deleted successfully!');
    }
}
