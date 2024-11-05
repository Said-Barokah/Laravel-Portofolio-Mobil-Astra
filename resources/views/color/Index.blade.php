@extends('layouts.sidebar')

@section('content')
    <div class="container">
        @extends('layouts.SuccessAlert')
        <section class="flex space-x-4 justify-evenly">
            <div class="flex justify-between items-center space-x-3">
                <p class="text-[14px]">Show</p>
                <select name="" id="" class="p-2 bg-gray-300 rounded-lg text-[14px]">
                    <option value="10">10</option>
                    <option value="25">25</option>
                </select>
                <p class="text-[14px]">entries</p>
            </div>
            <div class="w-full">
                <form action="" class="relative">
                    <input type="text" class="border-2 border-gray-300 p-3 rounded-md pl-[40px] w-full"
                        placeholder="Search...">
                    <img src="" alt=""
                        class="bg-gray-200 h-[20px] w-[20px] absolute top-[14px] left-[10px]">
                </form>
            </div>
        </section>
        <div class="flex w-full justify-end items-center my-2">
            <a href="{{ route('color.create') }}" class="bg-blue-500 flex space-x-3 justify-center items-center p-1">
                <p class="text-white font-semibold text-lg rounded-md p-2">+ Tambah sales</p>
            </a>
        </div>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="text-left">Nama</th>
                    <th class="text-left">Hex Code</th>
                    <th class="text-left">Warna</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-blue-50">
                @foreach ($colors as $index => $color)
                    <tr class="text-center">
                        <!-- Nomor Urut -->
                        <td class="px-5 align-middle">{{ $index + 1 }}</td>

                        <!-- Tipe Mobil -->
                        <td class="ml-2 align-middle text-left">{{ $color->name }}</td>

                        <!-- Nomor Mesin -->
                        <td class="ml-2 align-middle text-left">{{ $color->hex_code }}</td>
                        <td class="ml-2 align-middle text-left">
                            <span style="display: inline-block; width: 20px; height: 20px; background-color: {{ $color->hex_code }}; border: 1px solid #000;"></span>
                        </td>


                        <!-- Ikon untuk edit dan hapus -->
                        <td class="px-5 align-middle">
                            <div class="flex space-x-5 justify-center items-center">
                                <!-- Link Hapus -->
                                <form action="{{ route('color.destroy', ['color' => $color->id]) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus warna ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <img src="/images/trash-2 2.png" alt="Hapus" class="h-[20px] w-auto">
                                    </button>
                                </form>
                                <!-- Link Edit -->
                                <a href="{{ route('color.edit', ['color' => $color->id]) }}">
                                    <img src="/images/edit (1) 2.png" alt="Edit" class="h-[20px] w-auto">
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <section class="flex justify-center items-center space-x-4 mt-6">
            <!-- Pagination links -->
            {{ $colors->links('vendor.pagination.tailwind') }}
        </section>
    </div>
@endsection
