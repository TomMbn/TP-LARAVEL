<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tenant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('tenants.update', $tenant->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-4">
                            <label for="name">{{ __("Name") }}</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $tenant->name) }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="email">{{ __("Email") }}</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $tenant->email) }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="address">{{ __("Address") }}</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $tenant->address) }}">
                        </div>

                        <div class="form-group mb-4">
                            <label for="city">{{ __("City") }}</label>
                            <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $tenant->city) }}">
                        </div>

                        <div class="form-group mb-4">
                            <label for="phone_number">{{ __("Phone Number") }}</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number', $tenant->phone_number) }}">
                        </div>

                        <div class="form-group mb-4">
                            <label for="bank_account">{{ __("Bank Account") }}</label>
                            <input type="text" name="bank_account" id="bank_account" class="form-control" value="{{ old('bank_account', $tenant->bank_account) }}">
                        </div>

                        <div class="d-flex gap-3 mt-5">
                            <button type="submit" class="btn btn-success">{{ __("Update Tenant") }}</button>
                            <a href="{{ route('tenants.index') }}" class="btn btn-secondary">{{ __("Cancel") }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>