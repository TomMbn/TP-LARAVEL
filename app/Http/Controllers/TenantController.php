<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantController extends Controller
{
    /**
     * Display a listing of the tenants.
     */
    public function index()
    {
        $tenants = Tenant::where('user_id', auth()->id())->get();
        return view('tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new tenant.
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created tenant in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'bank_account' => 'nullable|string|max:255',
        ]);

        Tenant::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'phone_number' => $request->phone_number,
            'bank_account' => $request->bank_account,
        ]);

        return redirect()->route('tenants.index')->with('success', 'Tenant created successfully!');
    }

    /**
     * Display the specified tenant.
     */
    public function show(Tenant $tenant)
    {
        return view('tenants.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified tenant.
     */
    public function edit(Tenant $tenant)
    {
        return view('tenants.edit', compact('tenant'));
    }

    /**
     * Update the specified tenant in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tenants,email,' . $tenant->id,
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'bank_account' => 'nullable|string|max:255',
        ]);

        $tenant->update($request->all());

        return redirect()->route('tenants.index')->with('success', 'Tenant updated successfully!');
    }

    /**
     * Remove the specified tenant from storage.
     */
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();

        return redirect()->route('tenants.index')->with('success', 'Tenant deleted successfully!');
    }
}