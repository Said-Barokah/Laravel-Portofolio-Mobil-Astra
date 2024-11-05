<div id="booking-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg">
        <h2 class="text-lg font-semibold mb-4">Tambah Booking Baru</h2>

        <!-- Form for adding new booking -->
        <form id="booking-form">
            <!-- Input for Customer ID -->
            <div class="flex flex-col space-y-3 mt-3">
                <label for="new-customer-id" class="text-[14px] text-gray-700">ID Pelanggan</label>
                <input type="text" id="new-customer-id"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
            </div>

            <!-- Input for Vehicle Detail ID -->
            <div class="flex flex-col space-y-3 mt-3">
                <label for="new-vehicle-detail-id" class="text-[14px] text-gray-700">ID Detail Kendaraan</label>
                <input type="text" id="new-vehicle-detail-id"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
            </div>

            <!-- Input for Status -->
            <div class="flex flex-col space-y-3 mt-3">
                <label for="new-status" class="text-[14px] text-gray-700">Status</label>
                <input type="text" id="new-status"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
            </div>

            <!-- Buttons for modal actions -->
            <div class="flex justify-end space-x-3 mt-4">
                <button type="button" id="cancelBookingBtn" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                <button type="submit" id="saveBookingBtn" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>


    // Close modal on cancel button click
    document.getElementById('cancelBookingBtn').addEventListener('click', function() {
        document.getElementById('booking-modal').classList.add('hidden');
        document.getElementById('booking-modal').classList.remove('flex');
    });

    // Handle form submission with AJAX
    document.getElementById('booking-form').addEventListener('submit', function(event) {
        event.preventDefault();

        // Get values from input fields
        const customerId = document.getElementById('new-customer-id').value;
        const vehicleDetailId = document.getElementById('new-vehicle-detail-id').value;
        const status = document.getElementById('new-status').value;

        // Submit the new booking using AJAX
        fetch('/bookings', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    customer_id: customerId,
                    vehichel_detail_id: vehicleDetailId,
                    status: status
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Close the modal and reset form fields
                    document.getElementById('booking-modal').classList.add('hidden');
                    document.getElementById('new-customer-id').value = '';
                    document.getElementById('new-vehicle-detail-id').value = '';
                    document.getElementById('new-status').value = '';

                    // Optionally, update the UI or refresh the booking list
                    alert('Booking berhasil ditambahkan.');
                } else {
                    alert('Gagal menambah Booking.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan, coba lagi.');
            });
    });
</script>
