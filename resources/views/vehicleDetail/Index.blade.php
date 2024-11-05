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
            <a href="{{ route('vehicleDetail.create') }}" class="bg-blue-500 flex space-x-3 justify-center items-center p-1">
                <p class="text-white font-semibold text-lg rounded-md p-2">+ Tambah warna kendaraan</p>
            </a>
        </div>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th class="text-left">Tipe</th>
                    <th class="text-left">Nomer Mesin</th>
                    <th class="text-left">Nomer Rangka</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-blue-50">
                @foreach ($vehicleDetails as $index => $vehicleDetail)
                    <tr class="text-center">
                        <!-- Nomor Urut -->
                        <td class="px-5 align-middle">{{ $index + 1 }}</td>

                        <!-- Gambar kendaraan -->
                        <td class="p-4 align-middle">
                            <div class="flex justify-center items-center">
                                <img src="{{ Storage::url($vehicleDetail->vehicleColor->photo) }}" alt="{{ $vehicleDetail->vehicleColor->vehicle->name }}"
                                    class="h-[40px] w-[30px] bg-gray-400 object-cover object-center">
                            </div>
                        </td>

                        <!-- Tipe Mobil -->
                        <td class="ml-2 align-middle text-left">{{ $vehicleDetail->vehicleColor->vehicle->name }}</td>

                        <!-- Nomor Mesin -->
                        <td class="ml-2 align-middle text-left">{{ $vehicleDetail->engine_number }}</td>

                        <td class="ml-2 align-middle text-left">{{ $vehicleDetail->chassis_number }}</td>

                        <!-- Ikon untuk edit dan hapus -->
                        <td class="px-5 align-middle">
                            <div class="flex space-x-5 justify-center items-center">
                                <!-- Link Hapus -->
                                <form action="{{ route('vehicleDetail.destroy', ['vehicle_detail' => $vehicleDetail->id]) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus tipe kendaraan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <img src="/images/trash-2 2.png" alt="Hapus" class="h-[20px] w-auto">
                                    </button>
                                </form>
                                <!-- Link Edit -->
                                <a href="{{ route('vehicleDetail.edit', ['vehicle_detail' => $vehicleDetail->id]) }}">
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
            {{ $vehicleDetails->links('vendor.pagination.tailwind') }}
        </section>
    </div>
@endsection