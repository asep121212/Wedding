<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ucapan & Doa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="overflow-x-auto">


            <div class="overflow-x-auto">
                <div class="flex flex-col">
                    <div class="w-full">
                        <div class="border-b border-gray-200 shadow">
                            <table class="divide-y divide-gray-300 m-3">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-10 py-5 text-xs text-gray-500">Nama</th>
                                        <th class="px-10 py-5 text-xs text-gray-500">Kehadiran</th>
                                        <th class="px-10 py-5 text-xs text-gray-500">Ucapan & Doa</th>
                                        <th class="px-10 py-5 text-xs text-gray-500">Edit</th>
                                        <th class="px-10 py-5 text-xs text-gray-500">Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-300">
                                    @forelse ($comments as $comment)
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $comment->nama }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $comment->kehadiran == 1 ? 'Hadir' : 'Berhalangan' }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ Str::limit($comment->pesan, 50) }}
                                            </div>
                                        </td>


                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-gray-500 text-center">Halaman Masih Kosong</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>