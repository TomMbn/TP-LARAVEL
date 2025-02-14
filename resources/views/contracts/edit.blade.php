<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Contract') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('contracts.update', $contract->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-4">
                            <label for="contract_template_id">{{ __("Contract Template") }}</label>
                            <select name="contract_template_id" id="contract_template_id" class="form-control" required>
                                <option value="">{{ __("Select Contract Template") }}</option>
                                @foreach ($contractTemplates as $contractTemplate)
                                    <option value="{{ $contractTemplate->id }}" {{ $contract->contract_template_id == $contractTemplate->id ? 'selected' : '' }}>{{ $contractTemplate->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="tenant_id">{{ __("Tenant") }}</label>
                            <select name="tenant_id" id="tenant_id" class="form-control" required>
                                <option value="">{{ __("Select Tenant") }}</option>
                                @foreach ($tenants as $tenant)
                                    <option value="{{ $tenant->id }}" {{ $contract->tenant_id == $tenant->id ? 'selected' : '' }}>{{ $tenant->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="box_id">{{ __("Box") }}</label>
                            <select name="box_id" id="box_id" class="form-control" required>
                                <option value="">{{ __("Select Box") }}</option>
                                @foreach ($boxes as $box)
                                    <option value="{{ $box->id }}" {{ $contract->box_id == $box->id ? 'selected' : '' }}>{{ $box->address }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="date_start">{{ __("Start Date") }}</label>
                            <input type="date" name="date_start" id="date_start" class="form-control" value="{{ old('date_start', $contract->date_start) }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="date_end">{{ __("End Date") }}</label>
                            <input type="date" name="date_end" id="date_end" class="form-control" value="{{ old('date_end', $contract->date_end) }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="monthly_price">{{ __("Monthly Price") }}</label>
                            <input type="number" name="monthly_price" id="monthly_price" class="form-control" value="{{ old('monthly_price', $contract->monthly_price) }}" required>
                        </div>

                        <div class="d-flex gap-3 mt-5">
                            <button type="submit" class="btn btn-success">{{ __("Update Contract") }}</button>
                            <a href="{{ route('contracts.index') }}" class="btn btn-secondary">{{ __("Cancel") }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>