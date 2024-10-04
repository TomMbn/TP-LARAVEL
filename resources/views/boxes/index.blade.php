<!-- resources/views/boxes/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Boxes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Bouton pour ajouter une nouvelle box -->
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addBoxModal">
                        {{ __('Add Box') }}
                    </button>

                    <!-- Liste des boxes de l'utilisateur connecté -->
                    <h3 class="mt-6 mb-4">{{ __('Your Boxes') }}</h3>

                    @if ($boxes->isEmpty())
                        <p>{{ __('You have no boxes yet.') }}</p>
                    @else
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">{{ __('Address') }}</th>
                                    <th class="border px-4 py-2">{{ __('City') }}</th>
                                    <th class="border px-4 py-2">{{ __('Tenant') }}</th>
                                    <th class="border px-4 py-2">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($boxes as $box)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $box->address }}</td>
                                        <td class="border px-4 py-2">{{ $box->city }}</td>
                                        <td class="border px-4 py-2">
                                            {{ $box->tenant_id ? 'Occupied' : 'Available' }}
                                        </td>
                                        <td class="border px-4 py-2">
                                            <!-- Par exemple, tu peux ajouter des boutons pour "Editer" ou "Supprimer" -->
                                            <button class="btn btn-secondary">{{ __('Edit') }}</button>
                                            <button class="btn btn-danger">{{ __('Delete') }}</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal d'ajout de box -->
    <div class="modal fade" id="addBoxModal" tabindex="-1" role="dialog" aria-labelledby="addBoxModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBoxModalLabel">{{ __('Add New Box') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire d'ajout de box -->
                    <form method="POST" action="{{ route('boxes.store') }}">
                        @csrf
                        <!-- Adresse de la box -->
                        <div class="form-group">
                            <label for="address">{{ __('Address') }}</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>

                        <!-- Ville de la box -->
                        <div class="form-group">
                            <label for="city">{{ __('City') }}</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Create Box') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

