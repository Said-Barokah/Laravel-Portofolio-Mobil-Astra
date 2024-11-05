@extends('layouts.sidebar')

@section('content')
    <div class="container">
        @extends('layouts.BookingCreate')


        <form action="{{ route('color.update', $color->id) }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col justify-center space-y-4">
            @csrf
            @method('PUT') <!-- Gunakan method PUT untuk update -->

            <div class="flex flex-col space-y-3">
                <label for="name" class="text-[14px] text-gray-700">Nama Lengkap</label>
                <input name="name" id="name" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    value="{{ old('name', $color->name) }}" required />
            </div>

            <div class="flex flex-col space-y-3">
                <label for="hex_code" class="text-[14px] text-gray-700">Nomer Telepon</label>
                <input name="hex_code" id="hex_code"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    value="{{ old('phone_number', $color->hex_code) }}" required />
            </div>

            <div class="flex flex-col space-y-3">
                <label for="color-preview" class="text-[14px] text-gray-700">Pratinjau Warna</label>
                <div id="color-preview" class="w-full h-10 border rounded-lg" style="background-color: {{ $color->hex_code }};"></div>
            </div>


            <button type="submit"
                class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-green-700 text-white">
                <p class="text-[18px] font-semibold">Update</p>
            </button>
        </form>

    </div>

    <script>

    document.getElementById('hex_code').addEventListener('input', function() {
        var hexColor = this.value;
        document.getElementById('color-preview').style.backgroundColor = hexColor;
    });
    </script>
@endsection