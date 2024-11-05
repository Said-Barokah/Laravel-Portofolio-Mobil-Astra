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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <section class="mt-12">
        <h1 class="font-bold text-black text-[28px] px-6">PROMO TOYOTA TERBARU {{ date('Y') }}</h1>

        <p class="text-gray-400 mb-10 px-6">Penawaran dan promo mobil Toyota online terbaru dari Auto2000 untuk Anda</p>
        <img src="{{ Storage::url($promoCodes[0]->photo) }}" alt="" class="w-full px-6">
    </section>
    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-12 px-6 mb-7">
        @foreach ($promoCodes as $promoCode)

        <div class="shadow-md px-2 py-6 flex flex-col justify-between">
            <img src="{{ Storage::url($promoCode->photo) }}" alt="" class="w-full mb-6 bg-gray-200">
            <h1 class="font-bold text-[16px]">{{ $promoCode->discount->name }}</h1>
            <p class="text-[12px] text-gray-400">
                {{ \Carbon\Carbon::parse($promoCode->start_date)->format('j M Y') }} - {{ \Carbon\Carbon::parse($promoCode->end_date)->format('j M Y') }}
            </p>
        </div>

        @endforeach

    </section>
    <section class="mt-12 px-6 mb-12">
        <h1 class="text-[28px] font-bold mb-4">INFORMASI TOYOTA</h1>
        <p class="text-base text-gray-400 text-justify">Selamat datang di dealer dan bengkel Toyota cabang resmi Auto2000. Tersedia beragam kebutuhan Toyota di dealer dan bengkel Toyota meliputi layanan purna jual seperti di servis mobil dan penjualan part Toyota. Pilih berbagai tipe maupun varian mobil baru Toyota dengan daftar harga dan spesifikasi yang tersedia di Auto2000. Temukan kendaraan Toyota terbaik yang sesuai dengan kebutuhan Anda hanya disini.</p>
    </section>
    @include('layouts.footer')
</body>

</html>
