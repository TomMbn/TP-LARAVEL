<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bills') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="mb-4 fs-6 fw-bold">{{ __('Unpaid Bills') }}</h3>
                    @if ($bills->isEmpty())
                        <p>{{ __('No unpaid bills.') }}</p>
                    @else
                        <table class="table-auto w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">{{ __('Contract') }}</th>
                                    <th class="border px-4 py-2">{{ __('Amount') }}</th>
                                    <th class="border px-4 py-2">{{ __('Period Number') }}</th>
                                    <th class="border px-4 py-2">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bills as $bill)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $bill->contract->id }}</td>
                                        <td class="border px-4 py-2">{{ $bill->amount }}</td>
                                        <td class="border px-4 py-2">{{ $bill->period_number }}</td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('bills.markAsPaid', $bill->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success">{{ __('Mark as Paid') }}</button>
                                            </form>
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
</x-app-layout>