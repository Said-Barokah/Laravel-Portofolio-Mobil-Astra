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
        <div class="ml-[100px] border border-[#A2001D] py-6 px-10 rounded-lg min-w-[800px]">
            <form action="">
                <textarea name="" id="" class="border-[1px] border-[#cecece] w-[100%] h-[100px]"> saya</textarea>
                <button class="rounded-lg bg-[#A2001D] text-white w-[100%] flex items-center justify-center h-[40px]">Kirim</button>
            </form>

        </div>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


</body>

</html>
