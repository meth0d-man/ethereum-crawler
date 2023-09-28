@extends('home')
@section ('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Address
                </th>
                <th scope="col" class="px-6 py-3">
                    ETH Balance
                </th>
            </tr>
            </thead>
            <tbody>
            @if($apiData)
            @foreach ($apiData as $item)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                         <span class="crimson-text">{{ $item->to }}</span>
                    </th>
                    <td class="px-6 py-4">
                         <span class="crimson-text">{{ $item->value }}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            @else
                <h1 class="crimson-text">No transactions</h1>
            @endif
        </div>
    </div>
@endsection
