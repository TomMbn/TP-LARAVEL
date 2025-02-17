<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Contract Template') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight">
                        {{ __('Available Variables') }}
                    </h3>
                    <div class="grid grid-cols-2 gap-4">
                        <ul class="list-disc pl-5 mt-3">
                            <li><strong>{{ '{tenant_name}' }}</strong> - {{ __('Name of the tenant') }}</li>
                            <li><strong>{{ '{tenant_email}' }}</strong> - {{ __('Email of the tenant') }}</li>
                            <li><strong>{{ '{tenant_address}' }}</strong> - {{ __('Address of the tenant') }}</li>
                            <li><strong>{{ '{tenant_city}' }}</strong> - {{ __('City of the tenant') }}</li>
                            <li><strong>{{ '{tenant_phone_number}' }}</strong> - {{ __('Phone number of the tenant') }}</li>
                            <li><strong>{{ '{tenant_bank_account}' }}</strong> - {{ __('Bank account of the tenant') }}</li>
                            <li><strong>{{ '{box_name}' }}</strong> - {{ __('Name of the box') }}</li>
                            <li><strong>{{ '{box_address}' }}</strong> - {{ __('Address of the box') }}</li>
                            <li><strong>{{ '{box_city}' }}</strong> - {{ __('City of the box') }}</li>
                        </ul>
                        <ul class="list-disc pl-5 mt-3">
                            <li><strong>{{ '{contract_monthly_price}' }}</strong> - {{ __('Monthly Price of the location') }}</li>
                            <li><strong>{{ '{contract_date_start}' }}</strong> - {{ __('Start date of the contract') }}</li>
                            <li><strong>{{ '{contract_date_end}' }}</strong> - {{ __('End date of the contract') }}</li>
                            <li><strong>{{ '{user_name}' }}</strong> - {{ __('Name of the user') }}</li>
                            <li><strong>{{ '{user_email}' }}</strong> - {{ __('Email of the user') }}</li>
                            <li><strong>{{ '{user_address}' }}</strong> - {{ __('Address of the user') }}</li>
                            <li><strong>{{ '{user_city}' }}</strong> - {{ __('City of the user') }}</li>
                            <li><strong>{{ '{user_phone_number}' }}</strong> - {{ __('Phone number of the user') }}</li>
                            <li><strong>{{ '{user_bank_account}' }}</strong> - {{ __('Bank account of the user') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('contract_templates.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="name">{{ __("Name") }}</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="template">{{ __("Contract Template") }}</label>
                            <textarea name="template" id="template" class="form-control" rows="10" required></textarea>
                        </div>

                        <div class="d-flex gap-3 mt-5">
                            <button type="submit" class="btn btn-success">{{ __("Add Contract Template") }}</button>
                            <a href="{{ route('contract_templates.index') }}" class="btn btn-secondary">{{ __("Cancel") }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>