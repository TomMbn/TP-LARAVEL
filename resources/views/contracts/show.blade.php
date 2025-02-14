<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contract Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Tenant') }}</h3>
                        <p class="text-sm text-gray-600">{{ $contract->tenant->name }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Box') }}</h3>
                        <p class="text-sm text-gray-600">{{ $contract->box->address }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Start Date') }}</h3>
                        <p class="text-sm text-gray-600">{{ $contract->date_start }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('End Date') }}</h3>
                        <p class="text-sm text-gray-600">{{ $contract->date_end }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Monthly Price') }}</h3>
                        <p class="text-sm text-gray-600">{{ $contract->monthly_price }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Contract Content') }}</h3>
                        <p class="text-sm text-gray-600">{{ $contract->content }}</p>
                    </div>

                    <div class="d-flex gap-3 mt-5">
                        <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-warning">{{ __("Edit") }}</a>
                        <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contract?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __("Delete") }}</button>
                        </form>
                        <a href="{{ route('contracts.index') }}" class="btn btn-secondary">{{ __("Back to List") }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>