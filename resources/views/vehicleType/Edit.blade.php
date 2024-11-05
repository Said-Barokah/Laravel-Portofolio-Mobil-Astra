@extends('layouts.sidebar')

@section('content')
    <div class="container">
        @extends('layouts.BookingCreate')


        <form action="{{ route('vehicleType.update', $vehicleType->id) }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col justify-center space-y-4">
            @csrf
            @method('PUT') <!-- Gunakan method PUT untuk update -->

            <!-- Service Advisor -->
            <div class="flex flex-col space-y-3">
                <label for="type" class="text-[14px] text-gray-700">Tipe</label>
                <input type="text" name="type" id="type"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    value="{{ old('type', $vehicleType->type) }}">
            </div>

            <div class="flex flex-col space-y-3">
                <label for="description" class="text-[14px] text-gray-700">Keterangan</label>
                <textarea name="description" id="description" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">{{ old('description', $vehicleType->description) }}</textarea>
            </div>


            <button type="submit"
                class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-green-700 text-white">
                <p class="text-[18px] font-semibold">Update</p>
            </button>
        </form>

    </div>

    <script></script>
@endsection
