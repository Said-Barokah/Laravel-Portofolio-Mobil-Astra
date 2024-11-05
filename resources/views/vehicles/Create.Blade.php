@extends('layouts.sidebar')

@section('content')
    <div class="container">
        @extends('layouts.ColorCreate')
        @extends('layouts.VehicleTypeCreate')

        <form action="{{ route('vehicle.store') }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col justify-center space-y-4">
            @csrf
            <a href="{{ route('vehicle.index') }}"
                class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-blue-300 text-white">
                <img src="" alt="" class="h-[20px] w-[20px] bg-white">
                <p class="text-[18px] font-semibold">Kembali</p>
            </a>

            <!-- Jenis Kendaraan -->
            <div class="flex flex-col space-y-3">
                <label for="name" class="text-[14px] text-gray-700">Jenis Kendaraan</label>
                <input type="text" name="name" id="name"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
            </div>

            <!-- Warna (select multiple colors if needed) -->
            <div class="flex flex-col space-y-3">
                <label for="color" class="text-[14px] text-gray-700">Warna</label>
                <select name="color_id" id="color" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    required>
                    <option value="" disabled selected>Pilih Warna</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                    @endforeach
                    <option value="add-new">Tambah Warna Baru</option>
                </select>
            </div>

            <div class="flex flex-col space-y-3">
                <label for="vehicleType" class="text-[14px] text-gray-700">Tipe</label>
                <select name="type_id" id="vehicleType" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    required>
                    <option value="" disabled selected>Pilih Tipe</option>
                    @foreach ($vehicleTypes as $vehicleType)
                        <option value="{{ $vehicleType->id }}">{{ $vehicleType->type }}</option>
                    @endforeach
                    <option value="add-type">Tambah Tipe Baru</option>
                </select>
            </div>

            {{-- @extends('layouts.ColorCreate') --}}
            <!-- Modal (Initially Hidden) for adding new color -->




            <!-- Stok -->
            <div class="flex flex-col space-y-3">
                <label for="stock" class="text-[14px] text-gray-700">Stok</label>
                <input type="number" name="stock" id="stock"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
            </div>

            <!-- Harga -->
            <div class="flex flex-col space-y-3">
                <label for="price" class="text-[14px] text-gray-700">Harga</label>
                <input type="number" name="price" id="price"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
            </div>


            <!-- Foto -->
            <div class="flex flex-col space-y-3">
                <label for="photo" class="text-[14px] text-gray-700">Foto</label>
                <input type="file" name="photo" id="photo"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" accept="image/*" required>
            </div>

            <!-- Transmisi -->
            <div class="flex flex-col space-y-3">
                <label for="transmission" class="text-[14px] text-gray-700">Transmisi</label>
                <input type="text" name="transmission" id="transmission"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
            </div>

            <!-- Tipe Mesin -->
            <div class="flex flex-col space-y-3">
                <label for="machine_type" class="text-[14px] text-gray-700">Tipe Mesin</label>
                <input type="text" name="machine_type" id="machine_type"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
            </div>

            <!-- Kapasitas Mesin (Displacement) -->
            <div class="flex flex-col space-y-3">
                <label for="displacement" class="text-[14px] text-gray-700">Displacement</label>
                <input type="text" name="displacement" id="displacement"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
            </div>

            <div class="flex flex-col space-y-3">
                <label for="max_torque" class="text-[14px] text-gray-700">Torsi Maksimum</label>
                <input type="text" name="max_torque" id="max_torque"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-green-700 text-white">
                <p class="text-[18px] font-semibold">Tambah</p>
            </button>
        </form>
    </div>

    <script>
        document.getElementById('color').addEventListener('change', function() {
            if (this.value === 'add-new') {
                document.getElementById('color-modal').classList.remove('hidden');
                document.getElementById('color-modal').classList.add('flex');
            }
        });
        document.getElementById('vehicleType').addEventListener('change', function() {
            if (this.value === 'add-type') {
                document.getElementById('type-modal').classList.remove('hidden');
                document.getElementById('type-modal').classList.add('flex');
            }
        });
    </script>
@endsection
