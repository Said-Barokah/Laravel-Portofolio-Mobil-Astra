@extends('layouts.sidebar')

@section('content')
    <div class="container">
        @extends('layouts.BookingCreate')


        <form action="{{ route('vehicleDetail.update', $vehicleDetail->id) }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col justify-center space-y-4">
            @csrf
            @method('PUT') <!-- Gunakan method PUT untuk update -->

            <!-- Service Advisor -->
            <div class="flex flex-col space-y-3">
                <label for="vehicle_color" class="text-[14px] text-gray-700">Kendaraan</label>
                <select name="vehicle_color_id" id="vehicle_color"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
                    <option value="" disabled selected>Pilih Tipe Kendaraan - Tipe - Warna</option>
                    @foreach ($vehicleColors as $vehicleColor)
                        <option value="{{ $vehicleColor->id }}"
                            {{ $vehicleColor->id == $vehicleDetail->vehicle_color_id ? 'selected' : '' }}>
                            {{ $vehicleColor->vehicle->name }} - {{ $vehicleColor->color->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col space-y-3">
                <label for="chassis_number" class="text-[14px] text-gray-700">Nomer Rangka</label>
                <input type="text" name="chassis_number" id="chassis_number"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    value="{{ old('chassis_number', $vehicleDetail->chassis_number) }}">
            </div>

            <div class="flex flex-col space-y-3">
                <label for="engine_number" class="text-[14px] text-gray-700">Nomer Mesin</label>
                <input type="text" name="engine_number" id="engine_number"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    value="{{ old('engine_number', $vehicleDetail->engine_number) }}">
            </div>

            <div class="flex flex-col space-y-3">
                <label for="license_plate" class="text-[14px] text-gray-700">Nomer Polisi</label>
                <input type="text" name="license_plate" id="license_plate"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    value="{{ old('license_plate', $vehicleDetail->license_plate) }}">
            </div>


            <button type="submit"
                class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-green-700 text-white" >
                <p class="text-[18px] font-semibold">Update</p>
            </button>
        </form>

    </div>

    <script>

    </script>
@endsection
