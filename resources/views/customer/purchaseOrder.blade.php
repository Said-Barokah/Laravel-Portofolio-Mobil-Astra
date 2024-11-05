<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

        .inter {
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
            font-variation-settings:
                "slnt" 0;

        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        .poppins {
            font-family: "Poppins", sans-serif;

        }

        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&display=swap');

        .dm-serif-display-regular {
            font-family: "DM Serif Display", serif;
            font-weight: 400;
            font-style: normal;
        }

        .dm-serif-display-regular-italic {
            font-family: "DM Serif Display", serif;
            font-weight: 400;
            font-style: italic;
        }
    </style>
    </style>
    <title>Document</title>
</head>

<body class="bg-white">
    @include('layouts.header')
    <div class="flex justify-center flex-col items-center bg-[#D9D9D933] mt-6 py-4 mb-5">
        <h1 class="font-semibold text-[#181A18] text-2xl mb-2">
            Akun Saya
        </h1>
        <p class="text-base text-[#181A18]">Lihat Semua Transaksi</p>
    </div>
    <div class="main mx-[80px] bg-white flex">
        @include('layouts.SidebarCustomer')
        <div class=" ml-[100px]">
            <div class="flex font-bold">
                <a href="{{ route('order.purchase.status', 'Pending') }}"
                    class="{{ $status === 'Pending' ? 'text-[#181A18] border-b-[1px] border-b-[#181A18]' : 'text-[#a3a3a3]' }} pb-2   mr-[30px]">
                    Pesanan Aktif
                </a>
                <a href="{{ route('order.purchase.status', 'Success') }}"
                    class="{{ $status === 'Success' ? 'text-[#181A18] border-b-[1px] border-b-[#181A18]' : 'text-[#a3a3a3]' }} pb-2">
                    Pesanan yang Selesai
                </a>
            </div>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="text-left">Kendaraan</th>
                        <th class="text-left">Kode Promo</th>
                        <th class="text-left">Total Pembayaran</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-blue-50">
                    @if ($payments->isEmpty())
                        <tr>
                            <td colspan="5" class="px-5 py-4 text-center text-gray-500">
                                Tidak ada pembayaran yang ditemukan.
                            </td>
                        </tr>
                    @else
                        @foreach ($payments as $index => $payment)
                            <tr class="text-center">
                                <!-- Nomor Urut -->
                                <td class="px-5 py-4 align-middle">{{ $index + 1 }}</td>
                                <!-- Tipe Mobil -->
                                <td class="px-5 py-4 ml-2 align-middle text-left">
                                    {{ $payment->booking->vehicleDetail->vehicleColor->vehicle->name }}</td>
                                <td class="px-5 py-4 ml-2 align-middle text-left">{{ $payment->promoCode->promo_code }}
                                </td>
                                <td class="px-5 py-4 ml-2 align-middle text-left">
                                    {{ number_format($payment->total_payment, 0, ',', '.') }}</td>
                                <td class="px-5 py-4 ml-2 align-middle text-left">
                                    <a href=""
                                        class="px-2 py-1 rounded-lg bg-amber-300 text-white font-bold">Lihat Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


</body>

</html>
