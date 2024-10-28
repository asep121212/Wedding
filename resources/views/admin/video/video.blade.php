<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery Video') }}
        </h2>
        <h2 class="text-xl text-blue-800"><a href="/dashboard/gallery">Fotos</a> | <a
                href="/admin/video/video">Video</a> </h2>
        <div class="py-12 ">

            <div class="overflow-x-auto">

                <div class="overflow-x-auto">
                    <div class="flex justify-end">
                        <a href="{{ route('video.create') }}" class="mr-4">
                            <button class="btn btn-primary">Add New</button>
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <div class="flex flex-col">
                            <div class="w-full">
                                <div class="border-b border-gray-200 shadow">
                                    <table class="divide-y divide-gray-300 m-3 w-full">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-10 py-5 text-xs text-gray-500">
                                                    Image
                                                </th>
                                                <th class="px-10 py-5 text-xs text-gray-500">
                                                    Name
                                                </th>
                                                <th class="px-10 py-5 text-xs text-gray-500">
                                                    Title
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

                                            @foreach ($gallery as $gallery)
                                            <tr class="whitespace-nowrap">
                                                <td class="px-6 py-4  text-gray-50	">
                                                    <video class="rounded max-w-sm	 max-h-24" controls>
                                                        <source src="/video/{{ $gallery->video }}" type="video/mp4">
                                                    </video>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class=" text-gray-900">
                                                        {{ $gallery->name }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class=" text-gray-900">
                                                        {{ $gallery->title }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4  ">
                                                    <a href="video/edit/{{$gallery->id }}"><button
                                                            class="px-4 py-1  btn btn-primary">Edit</button></a>
                                                </td>
                                                @method('DELETE')
                                                <td class="px-6 py-4  ">
                                                    <a href="video/destroy/{{$gallery->id }}"><button
                                                            class="px-4 py-1  btn btn-error">Delete</button></a>
                                                </td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
        </div>
    </x-slot>

</x-app-layout>