<div id="type-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 justify-center items-center hidden">

    <div class="bg-white p-6 rounded-lg">
        <h2 class="text-lg font-semibold mb-4">Tambah Tipe Baru</h2>

        <!-- Form for adding new type -->
        <form id="type-form">
            <!-- Input for New type Name -->
            <div class="flex flex-col space-y-3 mt-3">
                <label for="new-type-name" class="text-[14px] text-gray-700">Tipe</label>
                <input type="text" id="new-type-name"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
            </div>

            <!-- Buttons for modal actions -->
            <div class="flex justify-end space-x-3 mt-4">
                <button type="button" id="cancelBtn" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                <button type="submit" id="savetypeBtn"
                    class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>s
<script>


    document.getElementById('cancelBtn').addEventListener('click', function() {
        document.getElementById('type-modal').classList.add('hidden');
        document.getElementById('type-modal').classList.remove('flex');
    });


    document.getElementById('type-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const type = document.getElementById('new-type-name').value;

        // Submit the new type using AJAX
        fetch('/vehicle-types', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(
                    type
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Close the modal and add the new color to the select options
                    const select = document.getElementById('vehicleType');
                    const option = new Option(data.vehicleType.type, data.vehicleType.id);
                    select.add(option, select.options[select.options.length -
                        2]); // Add before "Tambah Warna Baru"
                    select.value = data.vehicleType.id;
                    document.getElementById('type-modal').classList.add('hidden');
                } else {
                    alert('Gagal menambah Tipe.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan, coba lagi.');
            });
    });
</script>
