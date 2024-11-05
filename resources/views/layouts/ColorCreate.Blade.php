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
                <button type="button" id="cancelBtn" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                <button type="submit" id="saveColorBtn"
                    class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>s
<script>
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
