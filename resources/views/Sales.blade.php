@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="mt-4 text-3xl font-semibold text-gray-800">Dashboard</h1>
                <p class="text-lg text-gray-600">Data Sales Man</p>
            </div>
            <div>
                <a href="{{route('sales-man.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Tambahkan Data
                </a>
            </div>
        </div>
        @if (session('success'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                        </svg></div>
                    <div>
                        <p class="font-bold"> {{ session('success') }}</p>
                        <p class="text-sm">Make sure you know how these changes affect you.</p>
                    </div>
                </div>
            </div>
        @endif
        <section class="container mx-auto p-6 font-mono">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr
                                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Nomer Telepon</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($sales as $index => $man)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">
                                        <div class="flex items-center text-sm">
                                            <div class="h-8 mr-3 rounded-full md:block">
                                                <div class="flex items-center space-x-2">
                                                    <div class="w-8 h-8 flex items-center justify-center">
                                                        <p class="font-semibold text-black">{{ $index + 1 }}</p>
                                                    </div>
                                                    <p class="font-semibold text-black">{{ $man->name }}</p>
                                                </div>
                                            </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm border">{{ $man->phone_number }}</td>
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
