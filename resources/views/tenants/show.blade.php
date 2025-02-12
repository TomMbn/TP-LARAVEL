<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenant Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Name') }}</h3>
                        <p class="text-sm text-gray-600">{{ $tenant->name }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Email') }}</h3>
                        <p class="text-sm text-gray-600">{{ $tenant->email }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Address') }}</h3>
                        <p class="text-sm text-gray-600">{{ $tenant->address }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('City') }}</h3>
                        <p class="text-sm text-gray-600">{{ $tenant->city }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Phone Number') }}</h3>
                        <p class="text-sm text-gray-600">{{ $tenant->phone_number }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Bank Account') }}</h3>
                        <p class="text-sm text-gray-600">{{ $tenant->bank_account }}</p>
                    </div>

                    <div class="d-flex gap-3 mt-5">
                        <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-warning">{{ __("Edit") }}</a>
                        <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this tenant?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __("Delete") }}</button>
                        </form>
                        <a href="{{ route('tenants.index') }}" class="btn btn-secondary">{{ __("Back to List") }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>