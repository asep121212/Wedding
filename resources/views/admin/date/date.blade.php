<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Date Management') }}
        </h2>

        <div class="py-12">
            <div class="overflow-x-auto">
                <div class="flex justify-end mb-4">
                    <a href="{{ route('date.create') }}" class="mr-4">
                        <button class="btn btn-primary">Add New Date</button>
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <div class="flex flex-col">
                        <div class="w-full">
                            <div class="border-b border-gray-200 shadow">
                                <table class="divide-y divide-gray-300 m-3 w-full">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-10 py-5 text-xs text-gray-500">Hour</th>
                                            <th class="px-10 py-5 text-xs text-gray-500">Day</th>
                                            <th class="px-10 py-5 text-xs text-gray-500">Minute</th>
                                            <th class="px-10 py-5 text-xs text-gray-500">Second</th>
                                            <th class="px-10 py-5 text-xs text-gray-500">Edit</th>
                                            <th class="px-10 py-5 text-xs text-gray-500">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-300">
                                        @foreach ($dates as $date)
                                        <tr class="whitespace-nowrap">
                                            <td class="px-6 py-4">{{ $date->hour }}</td>
                                            <td class="px-6 py-4">{{ $date->day }}</td>
                                            <td class="px-6 py-4">{{ $date->minute }}</td>
                                            <td class="px-6 py-4">{{ $date->second }}</td>

                                            <td class="px-6 py-4">
                                                <a href="{{ route('date.edit', $date->id) }}">
                                                    <button class="px-4 py-1 btn btn-primary">Edit</button>
                                                </a>
                                            </td>
                                            @method('DELETE')
                                            <td class="px-6 py-4  ">
                                                <a href="date/destroy/{{$date->id }}"><button
                                                        class="px-4 py-1  btn btn-error">Delete</button></a>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </x-slot>
</x-app-layout>