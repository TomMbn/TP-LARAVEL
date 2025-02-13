<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\ContractTemplateController;
use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/boxes', [BoxController::class, 'index'])->name('boxes.index');
    Route::post('/boxes', [BoxController::class, 'store'])->name('boxes.store');
    Route::get('/boxes/{box}', [BoxController::class, 'show'])->name('boxes.show');
    Route::put('/boxes/{box}', [BoxController::class, 'update'])->name('boxes.update');
    Route::delete('/boxes/{box}', [BoxController::class, 'destroy'])->name('boxes.destroy');

    // Routes for tenants
    Route::get('/tenants', [TenantController::class, 'index'])->name('tenants.index');
    Route::get('/tenants/create', [TenantController::class, 'create'])->name('tenants.create');
    Route::post('/tenants', [TenantController::class, 'store'])->name('tenants.store');
    Route::get('/tenants/{tenant}', [TenantController::class, 'show'])->name('tenants.show');
    Route::get('/tenants/{tenant}/edit', [TenantController::class, 'edit'])->name('tenants.edit');
    Route::put('/tenants/{tenant}', [TenantController::class, 'update'])->name('tenants.update');
    Route::delete('/tenants/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');

    // Routes for contract templates
    Route::get('/contract_templates', [ContractTemplateController::class, 'index'])->name('contract_templates.index');
    Route::get('/contract_templates/create', [ContractTemplateController::class, 'create'])->name('contract_templates.create');
    Route::post('/contract_templates', [ContractTemplateController::class, 'store'])->name('contract_templates.store');
    Route::get('/contract_templates/{contract_template}', [ContractTemplateController::class, 'show'])->name('contract_templates.show');
    Route::get('/contract_templates/{contract_template}/edit', [ContractTemplateController::class, 'edit'])->name('contract_templates.edit');
    Route::put('/contract_templates/{contract_template}', [ContractTemplateController::class, 'update'])->name('contract_templates.update');
    Route::delete('/contract_templates/{contract_template}', [ContractTemplateController::class, 'destroy'])->name('contract_templates.destroy');

    // Routes for contracts
    Route::get('/contracts', [ContractController::class, 'index'])->name('contracts.index');
    Route::get('/contracts/create', [ContractController::class, 'create'])->name('contracts.create');
    Route::post('/contracts', [ContractController::class, 'store'])->name('contracts.store');
    Route::get('/contracts/{contract}', [ContractController::class, 'show'])->name('contracts.show');
    Route::get('/contracts/{contract}/edit', [ContractController::class, 'edit'])->name('contracts.edit');
    Route::put('/contracts/{contract}', [ContractController::class, 'update'])->name('contracts.update');
    Route::delete('/contracts/{contract}', [ContractController::class, 'destroy'])->name('contracts.destroy');
});

require __DIR__.'/auth.php';
