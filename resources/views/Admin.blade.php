@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="mt-4 text-3xl font-semibold text-gray-800">Dashboard</h1>
                <p class="text-lg text-gray-600">Data Admin</p>
            </div>
            <div>
                <a href="{{route('admin.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Tambah Data
                </a>
            </div>
        </div>
        <section class="container mx-auto p-4 font-mono">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr
                                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($admins as $index => $admin)


                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">
                                        <div class="flex items-center text-sm">
                                            <div class="w-8 h-8 mr-3 rounded-full md:block">
                                                <p class="font-semibold text-black">{{ $index + 1 }}</p>
                                            </div>
                                            <p class="font-semibold text-black">{{ $admin->name }}</p>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm border">{{ $admin->email }}</td>
                                    <td class="py-2 px-4">
                                        <a href="#" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                                        <a href="#" class="text-red-500 hover:text-red-700">Hapus</a>
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
