@extends('layouts.sidebar')

@section('content')
    <div class="container">
        @extends('layouts.BookingCreate')
        <form action="{{ route('vehicleColor.store') }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col justify-center space-y-4">
            @csrf
            <div class="flex flex-col space-y-3">
                <label for="vehicle" class="text-[14px] text-gray-700">Kendaraan</label>
                <select name="vehicle_id" id="vehicle" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    required>
                    <option value="" disabled selected>Pilih Kendaraan</option>
                    @foreach ($vehicles as $vehicle)
                        <option value={{ $vehicle->id }}>{{ $vehicle->name }}</option>
                    @endforeach
                    <option value="add-new-vehicle">Tambah Kendaraan Baru Baru</option>
                </select>
            </div>
            <div class="flex flex-col space-y-3">
                <label for="color" class="text-[14px] text-gray-700">Warna</label>
                <select name="color_id" id="color" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    required>
                    <option value="" disabled selected>Pilih Warna</option>
                    @foreach ($colors as $color)
                        <option value={{ $color->id }} data-hex={{ $color->hex_code }}>{{ $color->name }}</option>
                    @endforeach
                    <option value="add-new-vehicle">Tambah Warna Baru Baru</option>
                </select>
                <div id="color-preview" class="w-full h-10 mt-3 border rounded-lg"></div>
            </div>
            <div class="flex flex-col space-y-3">
                <label for="photo" class="text-[14px] text-gray-700">Foto</label>
                <input type="file" name="photo" id="photo"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" accept="image/*">
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
