<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Hello, ") . auth()->user()->name . "!" }}
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg">{{ __('Quick Actions') }}</h3>
                        <ul class="list-disc pl-5 mt-3">
                            <li><a href="{{ route('tenants.create') }}" class="text-blue-500">{{ __('Add Tenant') }}</a></li>
                            <li><a href="{{ route('contract_templates.create') }}" class="text-blue-500">{{ __('Create Contract Template') }}</a></li>
                            <li><a href="{{ route('contracts.create') }}" class="text-blue-500">{{ __('Create Contract') }}</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Statistics -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg">{{ __('Statistics') }}</h3>
                        <ul class="list-disc pl-5 mt-3">
                            <li>{{ __('Total Boxes: ') }} {{ \App\Models\Box::where('user_id', auth()->id())->count() }}</li>
                            <li>{{ __('Total Tenants: ') }} {{ \App\Models\Tenant::where('user_id', auth()->id())->count() }}</li>
                            <li>{{ __('Total Contracts: ') }} {{ \App\Models\Contract::where('user_id', auth()->id())->count() }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Notifications -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg">{{ __('Notifications') }}</h3>
                        <ul class="list-disc pl-5 mt-3">
                            <li>{{ __('No new notifications') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
