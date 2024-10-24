<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timeline') }}
        </h2>
        <div class="py-12 ">

            <div class="overflow-x-auto">

                <div class="overflow-x-auto">
                    <div class="flex justify-end">
                        <a href="{{ route('timeline.create') }}" class="mr-4">
                            <button class="btn btn-primary">Add New</button>
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <div class="flex flex-col">
                            <div class="w-full">
                                <div class="border-b border-gray-200 shadow">
                                    <table class="divide-y divide-gray-300 m-3 ">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-10 py-5 text-xs text-gray-500">
                                                    Name
                                                </th>
                                                <th class="px-10 py-5 text-xs text-gray-500">
                                                    Tanggal
                                                </th>
                                                <th class="px-10 py-5 text-xs text-gray-500">
                                                    Story
                                                </th>
                                                <th class="px-10 py-5 text-xs text-gray-500">
                                                    Edit
                                                </th>
                                                <th class="px-10 py-5 text-xs text-gray-500">
                                                    Delete
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-300">

                                            @forelse ($timeline as $timeline)
                                            <tr class="whitespace-nowrap">


                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-900">

                                                        {{ Str::limit($timeline->name,50) }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-900">

                                                        {{ Str::limit($timeline->date,50) }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-900">

                                                        {{ Str::limit($timeline->story,50) }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4  ">
                                                    <a href="timeline/edit/{{$timeline->id }}"><button
                                                            class="px-4 py-1 text-sm btn btn-primary">Edit</button></a>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="timeline/destroy/{{$timeline->id }}"><button
                                                            class="px-4 py-1 text-sm btn btn-error">Delete</button></a>
                                                </td>

                                            </tr>
                                            @empty
                                            <td class="text-gray-500">Halaman Masih Kosong</td>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>