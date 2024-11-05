@extends('layouts.sidebar')

@section('content')
    <div class="container">
        @extends('layouts.BookingCreate')


        <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col justify-center space-y-4">
            @csrf
            <a href="{{ route('vehicle.index') }}"
                class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-blue-300 text-white">
                <img src="" alt="" class="h-[20px] w-[20px] bg-white">
                <p class="text-[18px] font-semibold">Kembali</p>
            </a>

            <div class="flex flex-col space-y-3">
                <label for="service_advisor" class="text-[14px] text-gray-700">Service Advisor</label>
                <select name="service_advisor_id" id="service_advisor"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
                    <option value="" disabled selected>Pilih Service Advisor</option>
                    @foreach ($serviceAdvisors as $serviceAdvisor)
                        <option value={{ $serviceAdvisor->id }}>{{ $serviceAdvisor->name }}</option>
                    @endforeach
                    <option value="add-new-service-advisor">Tambah Service Advisor Baru</option>

                </select>
            </div>






            <!-- Stok -->
            <div class="flex flex-col space-y-3">
                <label for="service_advisor" class="text-[14px] text-gray-700">Sales</label>
                <select name="sales_id" id="service_advisor"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
                    <option value="" disabled selected>Pilih Sales</option>
                    @foreach ($sales as $user)
                        <option value={{ $user->id }}>{{ $user->name }}</option>
                    @endforeach
                    <option value="add-new-sales">Tambah Service Sales</option>

                </select>
            </div>






            <div class="flex flex-col space-y-3">
                <label for="payment_methode" class="text-[14px] text-gray-700">Sales</label>
                <select name="payment_method_id" id="payment_methode"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
                    <option value="" disabled selected>Pilih Metode Pembayaran</option>
                    @foreach ($paymentMethodes as $paymentMethode)
                        <option value={{ $paymentMethode->id }}>{{ $paymentMethode->name }}</option>
                    @endforeach
                    <option value="add-new-payment-methodes">Tambah Metode Pembayaran</option>

                </select>
            </div>


            <!-- Select Booking -->
            <div class="flex flex-col space-y-3">
                <label for="booking" class="text-[14px] text-gray-700">Booking</label>
                <select name="booking_id" id="booking"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
                    <option value="" disabled selected>Pilih Pesanan-(Customer)-(Nomer Rangka)-(Tipe Mobil)-(Harga)
                    </option>
                    <option value="add-new-booking">Tambah Pesanan Baru</option>
                    @foreach ($bookings as $booking)
                        <option value={{ $booking->id }} data-price="{{ $booking->vehicleDetail->vehicleColor->vehicle->price }}">
                            ({{ $booking->customer->name }})
                            -({{ $booking->vehicleDetail->chassis_number }}) -
                            ({{ $booking->vehicleDetail->vehicleColor->vehicle->name }}) -
                            ({{ number_format($booking->vehicleDetail->vehicleColor->vehicle->price, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Select Promo (Opsional) -->
            <div class="flex flex-col space-y-3">
                <label for="promo_select" class="text-[14px] text-gray-700">Promo (Opsional)</label>
                <select name="promo_code_id" id="promo_select"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
                    <option value="" selected>Tidak Ada Promo</option> <!-- Opsi default -->
                    @foreach ($promoCodes as $promo)
                        <option value={{ $promo->id }} data-type="{{ $promo->discount->type }}"
                            data-amount="{{ $promo->discount->amount }}">
                            ({{ $promo->promo_code }})
                            -
                            @if ($promo->discount->type == 'Nominal')
                                ({{ number_format($promo->discount->amount, 0, ',', '.') }})
                            @elseif ($promo->discount->type == 'Persentase')
                                ({{ $promo->discount->amount }}%)
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col space-y-3">
                <label for="total_payment" class="text-[14px] text-gray-700">Total Pembayaran</label>
                <input type="text" id="total_payment" name="total_payment"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" readonly>
            </div>

            <div class="flex flex-col space-y-3">
                <label for="status" class="text-[14px] text-gray-700">Status</label>
                <select name="status" id="status"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
                    <option value="Pending" selected>Menunggu</option>
                    <option value="Success" selected>Sukses</option> <!-- Opsi default -->
                </select>
            </div>

            <button type="submit"
                class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-green-700 text-white">
                <p class="text-[18px] font-semibold">Tambah</p>
            </button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            console.log("jQuery loaded!");
        });
        $(document).ready(function() {
            $('#booking').select2({
                placeholder: "Pilih Pesanan-(Customer)-(Nomer Rangka)-(Tipe Mobil)-(Harga)",
                allowClear: true
            });
        });

        $(document).ready(function() {
            // Event listener untuk perubahan pada elemen select dengan id #booking
            $('#booking').on('change', function() {
                var selectedValue = $(this).val();
                // Cek jika opsi 'Tambah Pesanan Baru' dipilih
                if (selectedValue === 'add-new-booking') {
                    document.getElementById('booking-modal').classList.remove('hidden');
                    document.getElementById('booking-modal').classList.add('flex');
                    // Tambahkan logika untuk membuka form atau modal 'Tambah Pesanan Baru' di sini
                } else {
                    // Mendapatkan data-price dari opsi yang dipilih
                    var selectedPrice = $(this).find(':selected').data('price');
                    updateBookingPrice();
                    // Tambahkan logika lain di sini, misalnya mengupdate field harga atau lainnya
                }
            });

            $('#promo_select').on('change', function(){
                applyPromoDiscount();
            })
        });




        let bookingPrice = 0;
        let totalPayment = 0;

        function updateBookingPrice() {
            const bookingSelect = document.getElementById('booking');
            const selectedBookingOption = bookingSelect.options[bookingSelect.selectedIndex];

            if (selectedBookingOption) {
                // Dapatkan harga kendaraan dari data attribute
                bookingPrice = parseFloat(selectedBookingOption.getAttribute('data-price')) || 0;
                // Set total pembayaran dengan harga booking
                totalPayment = bookingPrice;
                applyPromoDiscount(); // Terapkan diskon jika sudah ada promo dipilih
            }

            updateTotalPaymentDisplay();
        }

        function applyPromoDiscount() {
            const promoSelect = document.getElementById('promo_select');
            if (promoSelect.value) {
                const selectedPromoOption = promoSelect.options[promoSelect.selectedIndex];
                const discountType = selectedPromoOption.getAttribute('data-type');
                const discountAmount = parseFloat(selectedPromoOption.getAttribute('data-amount')) || 0;

                // Reset totalPayment ke harga booking
                totalPayment = bookingPrice;

                // Terapkan diskon jika promo dipilih
                if (discountType === 'Nominal') {
                    totalPayment -= discountAmount;
                } else if (discountType === 'Persentase') {
                    totalPayment -= (bookingPrice * discountAmount / 100);
                }
            } else {
                // Jika tidak ada promo, total pembayaran sama dengan harga booking
                totalPayment = bookingPrice;
            }

            updateTotalPaymentDisplay();
        }

        function updateTotalPaymentDisplay() {
            // Format total pembayaran ke mata uang IDR
            document.getElementById('total_payment').value = totalPayment.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
        }
    </script>
@endsection
