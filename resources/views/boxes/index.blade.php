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
                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
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

