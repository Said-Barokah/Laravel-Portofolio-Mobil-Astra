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

<body>
    @include('layouts.header')
    <section class="bg-white mb-[70px] px-[40px]">

        <div class="max-w-7xl mx-auto px-4 py-12 md:flex md:items-center">
            <!-- Left: Text Content -->
            <div class="md:w-1/2">
                <h1 class="poppins text-sm text-[#A2001D] mb-4">DEALER CABANG</h1>
                <h1 class="poppins text-4xl text-[#100E34] font-bold">Auto2000 HR</h1>
                <h1 class="poppins text-4xl text-[#100E34] font-bold
                ">Muhammad</h1>
                <p class="text-gray-700 mb-4">
                    Selamat datang di Auto2000 HR Muhammad. Temukan mobil Toyota terbaru dengan penawaran terbaik di
                    sini. Promo menarik dan kemudahan pembayaran ada di sini. Layanan purnajual dengan bengkel terbaik
                    juga siap melayani Anda. Kunjungi kami sekarang!
                </p>
                <a href="#"
                    class="inline-block bg-black text-white py-2 px-4 rounded-full hover:bg-blue-400 font-semibold">
                    SINGUP HERE</a>
            </div>
            <!-- Right: Image -->
            <div class="md:w-1/2 mt-6 md:mt-0">
                <img src="/images/images-hero.jpg" alt="Hero Image" class="w-full h-auto rounded shadow-lg">
            </div>
        </div>
    </section>
    @include('layouts.profil')
    <div class="poppins flex justify-between mb-[70px]">
        <div class="flex flex-col items-center">
            <img src="/images/mobil 1.png" alt="">
            <p class="font-bold text-lg mt-5">AGYA GR SPORT</p>
        </div>
        <div class="flex flex-col items-center">
            <img src="/images/mobil 2.png" alt="">
            <p class="font-bold text-lg mt-5">YARIS</p>
        </div>
        <div class="flex flex-col items-center">
            <img src="/images/mobil 3.png" alt="">
            <p class="font-bold text-lg mt-5">AGYA</p>
        </div>
    </div>
    <div class="flex justify-between max-w-7xl mx-auto px-6 py-[80px]  items-center  bg-gray-50">
        <div class="">
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0 text-[#A2001D] text-3xl font-bold">|</div>
                <div>
                    <h2 class="text-[32px] font-bold text-black dm-serif-display-regular mb-[20px]">Ingin Konsultasi?</h2>
                    <p class="mt-1 text-gray-400 max-w-[300px]">Lakukan Konsultasi Pembelian Mobil Baru Toyota Anda
                        Dengan Account
                        Executive Auto2000 HR Muhammad</p>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center space-x-6">
            <button
                class="bg-white text-gray-300 rounded-full w-10 h-10 flex items-center justify-center focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <div class="flex space-x-4 poppins">
                <!-- Profile 1 -->
                <div class="text-center">
                    <img class="w-24 h-24 rounded-full mx-auto bg-gray-300 object-contain" src="images/profil 1.png" alt="Profile 1">
                    <p class="font-bold mt-2">Fransisca Lisa R</p>
                    <p class="text-gray-500">M : 0818 505 798</p>
                </div>
                <!-- Profile 2 -->
                <div class="text-center">
                    <img class="w-24 h-24 rounded-full mx-auto bg-gray-300 object-contain" src="images/profil 2.png" alt="Profile 2">
                    <p class="font-bold mt-2">Peni Agustya Q</p>
                    <p class="text-gray-500">M : 0877 5397 2000</p>
                </div>
                <!-- Profile 3 -->
                <div class="text-center">
                    <img class="w-24 h-24 rounded-full mx-auto bg-gray-300 object-contain" src="images/profil 3.png" alt="Profile 3">
                    <p class="font-bold mt-2">Sumarto</p>
                    <p class="text-gray-500">M : 0811 3298 000</p>
                </div>
                <!-- Profile 4 -->
                <div class="text-center">
                    <img class="w-24 h-24 rounded-full mx-auto bg-gray-300 object-contain" src="images/profil 4.png" alt="Profile 4">
                    <p class="font-bold mt-2">Erik Febriansyah R</p>
                    <p class="text-gray-500">M : 0812 1634 4603</p>
                </div>
                <!-- Profile 5 -->
                <div class="text-center">
                    <img class="w-24 h-24 rounded-full mx-auto bg-gray-300 object-contain" src="images/profil 5.png" alt="Profile 5">
                    <p class="font-bold mt-2">Farkhan Fahrudin</p>
                    <p class="text-gray-500">M : 0812 3488 8398</p>
                </div>
            </div>

            <button
                class="bg-white text-gray-300 rounded-full w-10 h-10 flex items-center justify-center focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
    @include('layouts.promo')
    @include('layouts.feedback')
    @include('layouts.footer')

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


</body>

</html>
