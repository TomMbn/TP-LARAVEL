<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Box') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Box Detail') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("View and update your box details.") }}
                        </p>
                    </header>
                        <form action="{{ route('boxes.update', $box->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-4">
                            <label for="address">{{ __("Address") }}</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $box->address) }}" required spellcheck="false" >
                        </div>

                        <div class="form-group mb-4">
                            <label for="city">{{ __("City") }}</label>
                            <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $box->city) }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="tenant">{{ __("Tenant") }}</label>
                            <input type="text" name="tenant" id="tenant" class="form-control" value="{{ $box->tenant_id ? 'Occupied' : 'Available' }}" required disabled>
                        </div>
                    
                        <div class="d-flex gap-3 mt-5">
                            <button type="submit" class="btn btn-success">{{ __("Update Box") }}</button>

                            <form action="{{ route('boxes.destroy', $box->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this box?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __("Delete Box") }}</button>
                            </form>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</x-app-layout>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">