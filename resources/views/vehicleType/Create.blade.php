@extends('layouts.sidebar')

@section('content')
    <div class="container">
        @extends('layouts.BookingCreate')
        <form action="{{ route('vehicleType.store') }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col justify-center space-y-4">
            @csrf
            <div class="flex flex-col space-y-3">
                <label for="type" class="text-[14px] text-gray-700">Tipe</label>
                <input type="text" name="type" id="type"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
            </div>

            <div class="flex flex-col space-y-3">
                <label for="description" class="text-[14px] text-gray-700">Keterangan</label>
                <textarea name="description" id="description" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"></textarea>
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
