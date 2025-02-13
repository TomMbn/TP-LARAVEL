<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Contract') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('contracts.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="contract_template_id">{{ __("Contract Template") }}</label>
                            <select name="contract_template_id" id="contract_template_id" class="form-control" required>
                                <option value="">{{ __("Select Contract Template") }}</option>
                                @foreach ($contractTemplates as $contractTemplate)
                                    <option value="{{ $contractTemplate->id }}">{{ $contractTemplate->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="tenant_id">{{ __("Tenant") }}</label>
                            <select name="tenant_id" id="tenant_id" class="form-control" required>
                                <option value="">{{ __("Select Tenant") }}</option>
                                @foreach ($tenants as $tenant)
                                    <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="box_id">{{ __("Box") }}</label>
                            <select name="box_id" id="box_id" class="form-control" required>
                                <option value="">{{ __("Select Box") }}</option>
                                @foreach ($boxes as $box)
                                    <option value="{{ $box->id }}">{{ $box->address }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex gap-3 mt-5">
                            <button type="submit" class="btn btn-success">{{ __("Add Contract") }}</button>
                            <a href="{{ route('contracts.index') }}" class="btn btn-secondary">{{ __("Cancel") }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>