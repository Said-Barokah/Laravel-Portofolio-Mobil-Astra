@extends('layouts.sidebar')

@section('content')
    <div class="container">
        @extends('layouts.BookingCreate')
        <form action="{{ route('vehicleDetail.store') }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col justify-center space-y-4">
            @csrf
            <div class="flex flex-col space-y-3">
                <label for="vehicle_color" class="text-[14px] text-gray-700">Jenis Kendaraan</label>
                <select name="vehicle_color_id" id="vehicle_color" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    required>
                    <option value="" disabled selected>Pilih Kendaraan - Tipe - Warna</option>
                    @foreach ($vehicleColors as $vehicleColor)
                        <option value={{ $vehicleColor->id }}>{{ $vehicleColor->vehicle->name }} - {{ $vehicleColor->color->name }}</option>
                    @endforeach
                    <option value="add-new-vehicleColor">Tambah Kendaraan Baru Baru</option>
                </select>
            </div>
            <div class="flex flex-col space-y-3">
                <label for="chassis_number" class="text-[14px] text-gray-700">Nomer Rangka</label>
                <input type="text" name="chassis_number" id="chassis_number"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
            </div>
            <div class="flex flex-col space-y-3">
                <label for="engine_number" class="text-[14px] text-gray-700">Nomer Mesin</label>
                <input type="text" name="engine_number" id="engine_number"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
            </div>
            <div class="flex flex-col space-y-3">
                <label for="license_plate" class="text-[14px] text-gray-700">Nomer Polisi</label>
                <input type="text" name="license_plate" id="license_plate"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
            </div>
            <button type="submit"
                class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-green-700 text-white">
                <p class="text-[18px] font-semibold">Tambah</p>
            </button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#color').change(function() {
                // Ambil nilai kode hex dari warna yang dipilih
                var selectedHex = $('option:selected', this).data('hex');

                // Jika ada warna yang dipilih, update preview dengan warna tersebut
                if (selectedHex) {
                    $('#color-preview').css('background-color', selectedHex);
                } else {
                    // Jika tidak ada yang dipilih, reset preview ke default
                    $('#color-preview').css('background-color', '');
                }
            });
        });
    </script>
@endsection
