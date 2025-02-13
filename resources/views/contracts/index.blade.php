<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contracts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('contracts.create') }}" class="btn btn-primary mb-4">{{ __('Add Contract') }}</a>
                    <table class="table">
                        <thead>
                            <tr class="bg-secondary text-white">
                                <th>{{ __('Tenant') }}</th>
                                <th>{{ __('Box') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contracts as $contract)
                                <tr>
                                    <td>{{ $contract->tenant->name }}</td>
                                    <td>{{ $contract->box->address }}</td>
                                    <td>
                                        <a href="{{ route('contracts.show', $contract->id) }}" class="btn btn-info">{{ __('View') }}</a>
                                        <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-success">{{ __('Edit') }}</a>
                                        <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" style="display:inline-block;">
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