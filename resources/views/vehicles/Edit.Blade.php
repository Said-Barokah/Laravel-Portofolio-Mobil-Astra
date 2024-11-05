@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <div id="color-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 justify-center items-center hidden">
            <div class="bg-white p-6 rounded-lg">
                <h2 class="text-lg font-semibold mb-4">Tambah Warna Baru</h2>

                <!-- Form for adding new color -->
                <form id="color-form">
                    <!-- Input for New Color Name -->
                    <div class="flex flex-col space-y-3 mt-3">
                        <label for="new-color-name" class="text-[14px] text-gray-700">Nama Warna</label>
                        <input type="text" id="new-color-name"
                            class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
                    </div>

                    <!-- Input for New Color Hex Code -->
                    <div class="flex flex-col space-y-3 mt-3">
                        <label for="new-color-hex" class="text-[14px] text-gray-700">Hex Code</label>
                        <input type="text" id="new-color-hex"
                            class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>

                        <!-- Preview element -->
                        <div id="color-preview" class="w-full h-10 mt-3 border rounded-lg"></div>
                    </div>

                    <!-- Buttons for modal actions -->
                    <div class="flex justify-end space-x-3 mt-4">
                        <button type="button" id="cancelBtn"
                            class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                        <button type="submit" id="saveColorBtn"
                            class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <form action="{{ route('vehicle.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col justify-center space-y-4">
            @csrf
            @method('PUT')
            <a href="{{ route('vehicle.index') }}"
                class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-blue-300 text-white">
                <img src="" alt="" class="h-[20px] w-[20px] bg-white">
                <p class="text-[18px] font-semibold">Kembali</p>
            </a>

            <!-- Jenis Kendaraan -->
            <div class="flex flex-col space-y-3">
                <label for="name" class="text-[14px] text-gray-700">Jenis Kendaraan</label>
                <input type="text" name="name" id="name"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    value="{{ old('name', $vehicle->name) }}" required>
            </div>

            <!-- Warna (select multiple colors if needed) -->
            <!-- Dropdown untuk Warna -->
            <div class="flex flex-col space-y-3">
                <label for="color" class="text-[14px] text-gray-700">Warna</label>
                <select name="color_id" id="color" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    required>
                    <option value="" disabled>Pilih Warna</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}" @selected($color->id == $vehicle->color_id)>{{ $color->name }}</option>
                    @endforeach
                    <option value="add-new">Tambah Warna Baru</option>
                </select>
            </div>

            <!-- Dropdown untuk Tipe -->
            <div class="flex flex-col space-y-3">
                <label for="vehicleType" class="text-[14px] text-gray-700">Tipe</label>
                <select name="type_id" id="vehicleType" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    required>
                    <option value="" disabled>Pilih Tipe</option>
                    @foreach ($vehicleTypes as $vehicleType)
                        <option value="{{ $vehicleType->id }}" @selected($vehicleType->id == $vehicle->type_id)>{{ $vehicleType->type }}
                        </option>
                    @endforeach
                    <option value="add-new">Tambah Tipe Baru</option>
                </select>
            </div>

            <!-- Stok -->
            <div class="flex flex-col space-y-3">
                <label for="stock" class="text-[14px] text-gray-700">Stok</label>
                <input type="number" name="stock" id="stock"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    value="{{ old('stock', $vehicle->stock) }}" required>
            </div>

            <!-- Harga -->
            <div class="flex flex-col space-y-3">
                <label for="price" class="text-[14px] text-gray-700">Harga</label>
                <input type="number" name="price" id="price"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    value="{{ old('price', $vehicle->price) }}" required>
            </div>

            <!-- Foto -->
            <div class="flex flex-col space-y-3">
                <label for="photo" class="text-[14px] text-gray-700">Foto</label>
                <input type="file" name="photo" id="photo"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" accept="image/*">
                <!-- Show existing photo if available -->
                @if ($vehicle->photo)
                    <img src="{{ asset('storage/' . $vehicle->photo) }}" alt="Current Photo"
                        class="mt-2 w-32 h-32 object-cover">
                @endif
            </div>

            <!-- Transmisi -->
            <div class="flex flex-col space-y-3">
                <label for="transmission" class="text-[14px] text-gray-700">Transmisi</label>
                <input type="text" name="transmission" id="transmission"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    value="{{ old('transmission', $vehicle->transmission) }}">
            </div>

            <!-- Tipe Mesin -->
            <div class="flex flex-col space-y-3">
                <label for="machine_type" class="text-[14px] text-gray-700">Tipe Mesin</label>
                <input type="text" name="machine_type" id="machine_type"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    value="{{ old('machine_type', $vehicle->machine_type) }}">
            </div>

            <!-- Kapasitas Mesin (Displacement) -->
            <div class="flex flex-col space-y-3">
                <label for="displacement" class="text-[14px] text-gray-700">Displacement</label>
                <input type="text" name="displacement" id="displacement"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    value="{{ old('displacement', $vehicle->displacement) }}">
            </div>

            <!-- Torsi Maksimum -->
            <div class="flex flex-col space-y-3">
                <label for="max_torque" class="text-[14px] text-gray-700">Torsi Maksimum</label>
                <input type="text" name="max_torque" id="max_torque"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"
                    value="{{ old('max_torque', $vehicle->max_torque) }}">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-green-700 text-white">
                <p class="text-[18px] font-semibold">Simpan</p>
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

        document.getElementById('new-color-hex').addEventListener('input', function() {
            const hexCode = this.value.trim(); // Trim any extra spaces
            const previewElement = document.getElementById('color-preview');

            // Check if the input is a valid hex color code (3 or 6 digits, optionally starting with #)
            const isValidHex = /^#?([0-9A-F]{3}|[0-9A-F]{6})$/i.test(hexCode);


            // If valid, update the preview color
            if (isValidHex) {
                const formattedHex = hexCode.startsWith('#') ? hexCode : `#${hexCode}`;
                previewElement.style.backgroundColor = formattedHex;
            } else {
                previewElement.style.backgroundColor = '#ffffff'; // default to white if invalid
            }
        });


        document.getElementById('cancelBtn').addEventListener('click', function() {
            document.getElementById('color-modal').classList.add('hidden');
            document.getElementById('color-modal').classList.remove('flex');
        });


        document.getElementById('color-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const name = document.getElementById('new-color-name').value;
            const hex_code = document.getElementById('new-color-hex').value;

            // Submit the new color using AJAX
            fetch('/colors', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        name,
                        hex_code
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Close the modal and add the new color to the select options
                        const select = document.getElementById('color');
                        const option = new Option(data.color.name, data.color.id);
                        select.add(option, select.options[select.options.length -
                            2]); // Add before "Tambah Warna Baru"
                        select.value = data.color.id;
                        document.getElementById('color-modal').classList.add('hidden');
                    } else {
                        alert('Gagal menambah warna.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan, coba lagi.');
                });
        });
    </script>
@endsection
