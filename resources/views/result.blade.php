@extends('home')
@section ('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Sent from
                </th>
                <th scope="col" class="px-6 py-3">
                    Received to
                </th>
                <th scope="col" class="px-6 py-3">
                    Amount of eth
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($apiData as $item)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $item->from }}
                </th>
                <td class="px-6 py-4">
                    {{ $item->to }}
                </td>
                <td id="parentRow" class="px-6 py-4">
                    {{ $item->ethValue }} ETH
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

