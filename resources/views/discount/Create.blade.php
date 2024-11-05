@extends('layouts.sidebar')

@section('content')
    <div class="container">
        @extends('layouts.BookingCreate')


        <form action="{{ route('discount.store') }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col justify-center space-y-4">
            @csrf
            <div class="flex flex-col space-y-3">
                <label for="name" class="text-[14px] text-gray-700">Nama Diskon</label>
                <input name="name" id="name" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required />
            </div>
            <div class="flex flex-col space-y-3">
                <label for="type" class="text-[14px] text-gray-700">Tipe Diskon</label>
                <select name="type" id="type" type="text"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
                    <option value="Persentase">Persentase</option>
                    <option value="Nominal">Nominal</option>
                </select>
            </div>

            <div class="flex flex-col space-y-3">
                <label for="amount" class="text-[14px] text-gray-700">Amount</label>
                <input name="amount" id="amount" type="number"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    required />
            </div>
            <button type="submit"
                class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-green-700 text-white">
                <p class="text-[18px] font-semibold">Simpan</p>
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
