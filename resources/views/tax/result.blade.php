<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tax Information Result') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">{{ __('Tax Information Summary') }}</h3>
                    @if ($message)
                        <div class="alert alert-warning">
                            {{ $message }}
                        </div>
                    @endif
                    <p class="text-sm text-gray-600">{{ __('Total Annual Income: ') }}{{ $totalIncome }}</p>
                    <p class="text-sm text-gray-600">{{ __('Taxable Income: ') }}{{ $taxableIncome }}</p>
                    <p class="text-sm text-gray-600">{{ __('Declaration Case: ') }}{{ $declarationCase }}</p>
                    <a href="{{ route('tax.index') }}" class="btn btn-secondary mt-4">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>