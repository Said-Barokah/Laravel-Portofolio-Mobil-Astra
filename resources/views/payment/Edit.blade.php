@extends('layouts.sidebar')

@section('content')
    <div class="container">
        @extends('layouts.BookingCreate')

        <form action="{{ route('payment.update', $payment->id) }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col justify-center space-y-4">
            @csrf
            @method('PUT') <!-- Gunakan method PUT untuk update -->

            <a href="{{ route('vehicle.index') }}"
                class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-blue-300 text-white">
                <img src="" alt="" class="h-[20px] w-[20px] bg-white">
                <p class="text-[18px] font-semibold">Kembali</p>
            </a>

            <!-- Service Advisor -->
            <div class="flex flex-col space-y-3">
                <label for="service_advisor" class="text-[14px] text-gray-700">Service Advisor</label>
                <select name="service_advisor_id" id="service_advisor"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
                    <option value="" disabled selected>Pilih Service Advisor</option>
                    @foreach ($serviceAdvisors as $serviceAdvisor)
                        <option value="{{ $serviceAdvisor->id }}" {{ $serviceAdvisor->id == $payment->service_advisor_id ? 'selected' : '' }}>
                            {{ $serviceAdvisor->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Sales -->
            <div class="flex flex-col space-y-3">
                <label for="sales" class="text-[14px] text-gray-700">Sales</label>
                <select name="sales_id" id="sales"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
                    <option value="" disabled selected>Pilih Sales</option>
                    @foreach ($sales as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $payment->sales_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Payment Method -->
            <div class="flex flex-col space-y-3">
                <label for="payment_methode" class="text-[14px] text-gray-700">Metode Pembayaran</label>
                <select name="payment_method_id" id="payment_methode"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
                    <option value="" disabled selected>Pilih Metode Pembayaran</option>
                    @foreach ($paymentMethods as $paymentMethod)
                        <option value="{{ $paymentMethod->id }}" {{ $paymentMethod->id == $payment->payment_method_id ? 'selected' : '' }}>
                            {{ $paymentMethod->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Booking -->
            <div class="flex flex-col space-y-3">
                <label for="booking" class="text-[14px] text-gray-700">Booking</label>
                <select name="booking_id" id="booking"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required>
                    <option value="" disabled selected>Pilih Pesanan-(Customer)-(Nomer Rangka)-(Tipe Mobil)-(Harga)</option>
                    @foreach ($bookings as $booking)
                        <option value="{{ $booking->id }}" {{ $booking->id == $payment->booking_id ? 'selected' : '' }}
                            data-price="{{ $booking->vehicleDetail->vehicleColor->vehicle->price }}">
                            ({{ $booking->customer->name }}) - ({{ $booking->vehicleDetail->chassis_number }})
                            - ({{ $booking->vehicleDetail->vehicleColor->vehicle->name }})
                            - ({{ number_format($booking->vehicleDetail->vehicleColor->vehicle->price, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Promo -->
            <div class="flex flex-col space-y-3">
                <label for="promo_select" class="text-[14px] text-gray-700">Promo (Opsional)</label>
                <select name="promo_code_id" id="promo_select"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
                    <option value="" selected>Tidak Ada Promo</option>
                    @foreach ($promoCodes as $promo)
                        <option value="{{ $promo->id }}" {{ $promo->id == $payment->promo_code_id ? 'selected' : '' }}
                            data-type="{{ $promo->discount->type }}" data-amount="{{ $promo->discount->amount }}">
                            ({{ $promo->promo_code }})
                            - @if ($promo->discount->type == 'Nominal')
                                ({{ number_format($promo->discount->amount, 0, ',', '.') }})
                            @elseif ($promo->discount->type == 'Persentase')
                                ({{ $promo->discount->amount }}%)
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Total Payment -->
            <div class="flex flex-col space-y-3">
                <label for="total_payment" class="text-[14px] text-gray-700">Total Pembayaran</label>
                <input type="text" id="total_payment" name="total_payment"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" value="{{ number_format($payment->total_payment, 0, ',', '.') }}" readonly>
            </div>

            <!-- Status -->
            <div class="flex flex-col space-y-3">
                <label for="status" class="text-[14px] text-gray-700">Status</label>
                <select name="status" id="status"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
                    <option value="Pending" {{ $payment->status == 'Pending' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Success" {{ $payment->status == 'Success' ? 'selected' : '' }}>Sukses</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-green-700 text-white">
                <p class="text-[18px] font-semibold">Update</p>
            </button>
        </form>
    </div>

    <!-- Script for updating promo and total payment -->
    <script>
        $(document).ready(function() {
            $('#booking').select2({
                placeholder: "Pilih Pesanan-(Customer)-(Nomer Rangka)-(Tipe Mobil)-(Harga)",
                allowClear: true
            });

            // Pre-load the existing total payment and promo
            updateBookingPrice();
            applyPromoDiscount();

            $('#booking').on('change', function() {
                updateBookingPrice();
            });

            $('#promo_select').on('change', function() {
                applyPromoDiscount();
            });
        });

        let bookingPrice = {{ $payment->booking->vehicleDetail->vehicleColor->vehicle->price }};
        let totalPayment = bookingPrice;

        function updateBookingPrice() {
            const bookingSelect = document.getElementById('booking');
            const selectedBookingOption = bookingSelect.options[bookingSelect.selectedIndex];

            if (selectedBookingOption) {
                bookingPrice = parseFloat(selectedBookingOption.getAttribute('data-price')) || 0;
                totalPayment = bookingPrice;
                applyPromoDiscount();
            }

            updateTotalPaymentDisplay();
        }

        function applyPromoDiscount() {
            const promoSelect = document.getElementById('promo_select');
            if (promoSelect.value) {
                const selectedPromoOption = promoSelect.options[promoSelect.selectedIndex];
                const discountType = selectedPromoOption.getAttribute('data-type');
                const discountAmount = parseFloat(selectedPromoOption.getAttribute('data-amount')) || 0;

                totalPayment = bookingPrice;

                if (discountType === 'Nominal') {
                    totalPayment -= discountAmount;
                } else if (discountType === 'Persentase') {
                    totalPayment -= (bookingPrice * discountAmount / 100);
                }
            } else {
                totalPayment = bookingPrice;
            }

            updateTotalPaymentDisplay();
        }

        function updateTotalPaymentDisplay() {
            document.getElementById('total_payment').value = totalPayment.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
        }
    </script>
@endsection
