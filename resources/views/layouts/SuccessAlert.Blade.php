<!-- Cek apakah ada pesan sukses di session -->
@if (session('success'))
    <div id="success-message" class="fixed top-0 left-0 w-full bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-b-lg shadow-md z-50">
        <div class="flex items-center justify-between">
            <div>
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            <button id="close-success-message" class="ml-4 text-green-700 hover:text-green-900">
                <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.828 6.828a1 1 0 00-1.414 0L10 8.586 6.586 5.172a1 1 0 00-1.414 1.414L8.586 10l-3.414 3.414a1 1 0 001.414 1.414L10 11.414l3.414 3.414a1 1 0 001.414-1.414L11.414 10l3.414-3.414a1 1 0 000-1.414z"/></svg>
            </button>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeButton = document.getElementById('close-success-message');
            const successMessage = document.getElementById('success-message');

            if (closeButton) {
                closeButton.addEventListener('click', function() {
                    successMessage.style.display = 'none';
                });
            }
        });
    </script>

@endif
