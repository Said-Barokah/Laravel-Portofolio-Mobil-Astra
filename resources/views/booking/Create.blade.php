@extends('layouts.sidebar')

@section('content')
    <div class="container">
        @extends('layouts.BookingCreate')


        <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col justify-center space-y-4">
            @csrf
            <a href="{{ route('vehicle.index') }}"
                class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-blue-300 text-white">
                <img src="" alt="" class="h-[20px] w-[20px] bg-white">
                <p class="text-[18px] font-semibold">Kembali</p>
            </a>

            <div class="flex flex-col space-y-3">
                <label for="customer" class="text-[14px] text-gray-700">Customer</label>
                <select name="customer_id" id="customer"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
                    <option value="" disabled selected>Pilih Customer</option>
                    @foreach ($customers as $customer)
                        <option value={{ $customer->id }}>{{ $customer->name }}</option>
                    @endforeach
                    <option value="add-new-customer">Tambah Customer Baru Baru</option>
                </select>
            </div>

            <!-- Stok -->
            <div class="flex flex-col space-y-3">
                <label for="vehicle_detail" class="text-[14px] text-gray-700">Detail Kendaraan</label>
                <select name="vehicle_detail_id" id="vehicle_detail"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
                    <option value="" disabled selected>Pilih Detail Kendaraan-[Tipe Kendaran]-[Nomer Rangka]</option>
                    @foreach ($vehicleDetails as $vehicleDetail)
                        <option value={{ $vehicleDetail->id }}>{{ $vehicleDetail->vehicleColor->vehicle->name }} {{ $vehicleDetail->chassis_number }}</option>
                    @endforeach
                    <option value="add-new-vehicle-detail">Tambah Detail Kendaraan</option>

                </select>
            </div>

            <div class="flex flex-col space-y-3">
                <label for="status" class="text-[14px] text-gray-700">Status</label>
                <select name="status" id="status"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
                    <option value="Pending" selected>Menunggu</option>
                    <option value="confirmed" selected>Terkonfirmasi</option> <!-- Opsi default -->
                </select>
            </div>

            <button type="submit"
                class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-green-700 text-white">
                <p class="text-[18px] font-semibold">Tambah</p>
            </button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            console.log("jQuery loaded!");
        });
        $(document).ready(function() {
            $('#booking').select2({
                placeholder: "Pilih Pesanan-(Customer)-(Nomer Rangka)-(Tipe Mobil)-(Harga)",
                allowClear: true
            });
        });


    </script>
@endsection
