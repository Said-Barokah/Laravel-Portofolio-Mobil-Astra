<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Include jQuery -->
    <!-- Tambahkan jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>
</head>

<body class="">
    <span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="openSidebar()">
        <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
    </span>
    <div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-white">
        <div class="text-xl">
            <div class="p-2.5 mt-1 flex items-center">
                <img src="/images/logo_auto2000-removebg-preview.png" alt="">
                <i class="bi bi-x cursor-pointer ml-28 lg:hidden" onclick="openSidebar()"></i>
            </div>
        </div>
        <a href="/"
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-300 text-white">
            <img src="" alt="" class="h-[15px]">
            <span class="text-[15px] ml-4 text-[#5F6165] font-bold">Dashboard</span>
        </a>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-300 text-white"
            onclick="dropdownKendaraan()">
            <img src="/images/icon-shop.png" alt="" class="h-[15px]">
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-[#5F6165] font-bold">Kendaran</span>
                <span class="text-sm rotate-180" id="arrowKendaraan">
                    <img src="/images/icon-dropdown.png" alt="" class="h-[7px]">
                </span>
            </div>
        </div>
        <div class="flex flex-col text-left text-sm mt-2 w-4/5 mx-auto text-[#5F6165] font-bold" id="submenuKendaraan">
            <a href="{{ route('vehicle.index') }}" class="cursor-pointer p-2 hover:bg-gray-300 rounded-md ml-3">
                Data Kendaraan
            </a>
            <a href="{{ route('booking.index') }}" class="cursor-pointer p-2 hover:bg-gray-300 rounded-md ml-3">
                Data Pemesanan
            </a>
            <a href="{{ route('payment.index') }}" class="cursor-pointer p-2 hover:bg-gray-300 rounded-md ml-3">
                Data Pembayaran
            </a>
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-300 text-white"
            onclick="dropdownProfile()">
            <img src="/images/icon-profile.png" alt="" class="h-[12px]">
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-[#5F6165] font-bold">Pengguna</span>
                <span class="text-sm rotate-180" id="arrowProfile">
                    <img src="/images/icon-dropdown.png" alt="" class="h-[7px]">
                </span>
            </div>
        </div>
        <div class="flex flex-col text-left text-sm mt-2 w-4/5 mx-auto text-[#5F6165] font-bold" id="submenuProfile">
            <a href="{{ route('customer.index') }}" class="cursor-pointer p-2 hover:bg-gray-300 rounded-md mt-1">
                Data Customer
            </a>
            <a href="{{ route('sales.index') }}" class="cursor-pointer p-2 hover:bg-gray-300 rounded-md mt-1">
                Data Sales
            </a>
            <a href="{{ route('serviceAdvisor.index') }}" class="cursor-pointer p-2 hover:bg-gray-300 rounded-md mt-1">
                Data Service Advisor
            </a>
            <a href="{{ route('admin.index') }}" class="cursor-pointer p-2 hover:bg-gray-300 rounded-md mt-1">
                Data Admin
            </a>
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-300 text-white"
            onclick="dropdownDetailKendaraan()">
            <img src="/images/icon-file.png" alt="" class="h-[12px]">
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-[#5F6165] font-bold">Detail Kendaraan</span>
                <span class="text-sm rotate-180" id="arrowKelola">
                    <img src="/images/icon-dropdown.png" alt="" class="h-[7px]">
                </span>
            </div>
        </div>
        <div class="flex flex-col text-left text-sm mt-2 w-4/5 mx-auto text-[#5F6165] font-bold"
            id="submenuDetailKendaraan">
            <a href="{{ route('vehicleColor.index') }}" class="cursor-pointer p-2 hover:bg-gray-300 rounded-md mt-1">
                Warna Kendaraan
            </a>
            <a href="{{ route('vehicleDetail.index') }}" class="cursor-pointer p-2 hover:bg-gray-300 rounded-md mt-1">
                Detail Kendaraan
            </a>
            <a href="{{ route('vehicleType.index') }}" class="cursor-pointer p-2 hover:bg-gray-300 rounded-md mt-1">
                Tipe Kendaraan
            </a>
            <a href="{{ route('color.index') }}" class="cursor-pointer p-2 hover:bg-gray-300 rounded-md mt-1">
                Data Warna
            </a>
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-300 text-white"
            onclick="dropdownDetailPromo()">
            <img src="/images/icon-file.png" alt="" class="h-[12px]">
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-[#5F6165] font-bold">Detail Promo</span>
                <span class="text-sm rotate-180" id="arrowKelola">
                    <img src="/images/icon-dropdown.png" alt="" class="h-[7px]">
                </span>
            </div>
        </div>
        <div class="flex flex-col text-left text-sm mt-2 w-4/5 mx-auto text-[#5F6165] font-bold"
            id="submenuDetailPromo">
            <a href="{{ route('promoCode.index') }}" class="cursor-pointer p-2 hover:bg-gray-300 rounded-md mt-1">
                Data Promo
            </a>
            <a href="{{ route('discount.index') }}" class="cursor-pointer p-2 hover:bg-gray-300 rounded-md mt-1">
                Data Diskon
            </a>
        </div>


        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-300 text-white"
            onclick="dropdownKelola()">
            <img src="/images/icon-file.png" alt="" class="h-[12px]">
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-[#5F6165] font-bold">Kelola</span>
                <span class="text-sm rotate-180" id="arrowKelola">
                    <img src="/images/icon-dropdown.png" alt="" class="h-[7px]">
                </span>
            </div>
        </div>
        <div class="flex flex-col text-left text-sm mt-2 w-4/5 mx-auto text-[#5F6165] font-bold" id="submenuKelola">
            <a href="/dashboard/admin" class="cursor-pointer p-2 hover:bg-gray-300 rounded-md mt-1">
                Tentang Auto
            </a>
            <a href="/dashboard/customer" class="cursor-pointer p-2 hover:bg-gray-300 rounded-md mt-1">
                Syarat dan Ketentuan
            </a>
            <a href="/dashboard/customer" class="cursor-pointer p-2 hover:bg-gray-300 rounded-md mt-1">
                FAQ
            </a>
            <a href="/dashboard/customer" class="cursor-pointer p-2 hover:bg-gray-300 rounded-md mt-1">
                Panduan Visual
            </a>
        </div>
        <a href="/"
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-300 text-white">
            <img src="" alt="" class="h-[12px]">
            <span class="text-[15px] ml-4 text-[#5F6165] font-bold">Service</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" name="admin"
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-300 text-white">
                <i class="bi bi-box-arrow-in-right"></i>
                <span class="text-[15px] ml-4 text-black font-bold">Logout</span>
            </button>
        </form>

    </div>

    <div class="ml-[300px] py-[20px] px-[50px] container-fluid">
        @yield('content')
    </div>

    <script type="text/javascript">
        function dropdownKendaraan() {
            document.querySelector("#submenuKendaraan").classList.toggle("hidden");
            document.querySelector("#arrowKendaraan").classList.toggle("rotate-0");
        }
        // dropdown();

        function dropdownKelola() {
            document.querySelector("#submenuKelola").classList.toggle("hidden");
            document.querySelector("#arrowKelola").classList.toggle("rotate-0");
        }

        function dropdownDetailPromo() {
            document.querySelector("#submenuDetailPromo").classList.toggle("hidden");
            document.querySelector("#arrowDetailPromo").classList.toggle("rotate-0");
        }

        function dropdownDetailKendaraan() {
            document.querySelector("#submenuDetailKendaraan").classList.toggle("hidden");
            document.querySelector("#arrowDetailKendaraan").classList.toggle("rotate-0");
        }
        // dropdown();

        function dropdownProfile() {
            document.querySelector("#submenuProfile").classList.toggle("hidden");
            document.querySelector("#arrowProfile").classList.toggle("rotate-0");
        }
        // dropdown();

        function openSidebar() {
            document.querySelector(".sidebar").classList.toggle("hidden");
        }
    </script>


</body>

</html>
