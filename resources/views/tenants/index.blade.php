<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('tenants.create') }}" class="btn btn-success mb-4"><i class="bi bi-plus-lg"></i> {{ __('Add Tenant') }}</a>
                    <table class="table">
                        <thead>
                            <tr class="bg-secondary text-white">
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Address') }}</th>
                                <th>{{ __('Phone')}}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tenants as $tenant)
                                <tr>
                                    <td>{{ $tenant->name }}</td>
                                    <td>{{ $tenant->email }}</td>
                                    <td>{{ $tenant->address }}</td>
                                    <td>{{ $tenant->phone_number }}</td>
                                    <td>
                                        <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                                        <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>