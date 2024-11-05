@extends('layouts.sidebar')

@section('content')
    <div class="container">
        @extends('layouts.SuccessAlert')
        <section class="flex space-x-4 justify-evenly">
            <div class="flex justify-between items-center space-x-3">
                <p class="text-[14px]">Show</p>
                <select name="" id="" class="p-2 bg-gray-300 rounded-lg text-[14px]">
                    <option value="">1</option>
                    <option value="">2</option>
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
            <a href="{{ route('vehicle.create') }}" class="bg-blue-500 flex space-x-3 justify-center items-center p-1">
                <p class="text-white font-semibold text-lg rounded-md p-2">+ Tambah</p>
            </a>
        </div>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="text-center">Foto</th>
                    <th class="text-left">Jenis Kendaraan</th>
                    <th class="text-left">Warna</th>
                    <th class="text-left">Stok</th>
                    <th class="text-left">Harga</th>
                    <th class="text-left">Displacement</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="bg-blue-50">
                @foreach ($vehicles as $index => $vehicle)
                <tr class="text-center"> <!-- Menambahkan text-center agar setiap elemen teks berada di tengah secara horizontal -->
                    <td class="px-5 align-middle">{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->

                    <!-- Gambar kendaraan -->
                    <td class="p-4 align-middle">
                        <div class="flex justify-center items-center">
                            <img src="{{ Storage::url($vehicle->photo) }}" alt="{{ $vehicle->name }}" class="h-[40px] w-auto bg-gray-400">
                        </div>
                    </td>

                    <!-- Nama kendaraan -->
                    <td class="ml-2 align-middle">{{ $vehicle->name }}</td>

                    <!-- Warna kendaraan -->
                    <td class="p-4 align-middle">
                        <div class="flex space-x-1 justify-start items-center">
                            @foreach ($vehicle->colors as $color)
                                <span class="w-[20px] h-[20px] rounded-full" style="background-color: {{ $color->hex_code }};"></span>
                            @endforeach
                        </div>
                    </td>

                    <!-- Jumlah stok -->
                    <td class="pr-5 align-middle">{{ $vehicle->stock }}</td>

                    <!-- Harga kendaraan dalam format uang -->
                    <td class="pr-5 align-middle">Rp. {{ number_format($vehicle->price, 0, ',', '.') }}</td>

                    <!-- Kapasitas kendaraan -->
                    <td class="pr-5 align-middle">{{ $vehicle->displacement }}</td>

                    <!-- Ikon untuk edit dan hapus -->
                    <td class="px-5 align-middle">
                        <div class="flex space-x-5 justify-center items-center">
                            <!-- Link Hapus -->
                            <form action="{{ route('vehicle.destroy', ['vehicle' => $vehicle->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kendaraan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <img src="/images/trash-2 2.png" alt="Hapus" class="h-[20px] w-auto">
                                </button>
                            </form>

                            <!-- Link Edit -->
                            <a href="{{ route('vehicle.edit', ['vehicle' => $vehicle->id]) }}">
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
            {{ $vehicles->links('vendor.pagination.tailwind') }}
        </section>

    </div>
@endsection
