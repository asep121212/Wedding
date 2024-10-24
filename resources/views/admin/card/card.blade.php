<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Card') }}
        </h2>
        <div class="py-12 ">

            <div class="overflow-x-auto">

                <div class="overflow-x-auto">
                    <div class="flex justify-end">
                        <a href="{{ route('card.create') }}" class="mr-4">
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
                                                    Image
                                                </th>
                                                <th class="px-10 py-5 text-xs text-gray-500">
                                                    Nomor Rekening
                                                </th>
                                                <th class="px-10 py-5 text-xs text-gray-500">
                                                    Atas Nama
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

                                            @forelse ($card as $card)
                                            <tr class="whitespace-nowrap">
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    <img class="w-30 md:w-25 lg:w-30" src=" 
                                                        {{ asset('storage/' . $card->image) }}"
                                                        alt="{{ $card->text }}">
                                                </td>

                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-900">

                                                        {{ Str::limit($card->text,50) }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-900">

                                                        {{ Str::limit($card->atas_nama,50) }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4  ">
                                                    <a href="card/edit/{{$card->id }}"><button
                                                            class="px-4 py-1 text-sm btn btn-primary">Edit</button></a>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="card/destroy/{{$card->id }}"><button
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