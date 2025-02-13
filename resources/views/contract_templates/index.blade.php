<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contract Templates') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('contract_templates.create') }}" class="btn btn-primary mb-4">{{ __('Add Contract Template') }}</a>
                    <table class="table">
                        <thead>
                            <tr class="bg-secondary text-white">
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contractTemplates as $contractTemplate)
                                <tr>
                                    <td>{{ $contractTemplate->name }}</td>
                                    <td>
                                        <a href="{{ route('contract_templates.show', $contractTemplate->id) }}" class="btn btn-info">{{ __('View') }}</a>
                                        <a href="{{ route('contract_templates.edit', $contractTemplate->id) }}" class="btn btn-success">{{ __('Edit') }}</a>
                                        <form action="{{ route('contract_templates.destroy', $contractTemplate->id) }}" method="POST" style="display:inline-block;">
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