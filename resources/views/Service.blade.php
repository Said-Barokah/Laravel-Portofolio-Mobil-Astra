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
    <section
        class="bg-gray-400 min-h-screen bg-[url('images/bg-services.png')] bg-cover pl-[80px] pt-[200px] sepia-30 contrast-125 brightness-90 saturate-50">
        <h1 class="text-white font-bold text-[42px] leading-6">LAYANAN PERBAIKAN MOBIL</h1>
        <h1 class="text-white font-bold text-[42px]">AHLI BERSERTIFIKAT</h1>
        <p class="text-white w-[50%] text-justify mb-4 mt-2">Toyota Auto2000 HR Muhammad menawarkan layanan perbaikan
            mobil yang dikelola oleh para ahli bersertifikat. Dengan pengalaman bertahun-tahun dan pelatihan khusus dari
            Toyota, para teknisi kami siap menangani berbagai masalah kendaraan Anda dengan keahlian dan ketelitian
            tinggi.</p>
        <div class="mt-4 flex">
            <button class="py-2 px-6 bg-[#A2001D] text-white mr-[32px]">BUAT JANJI</button>
            <div class="flex items-center">
                <img src="/images/phone-call 1.png" alt="" class="h-[30px] mr-4">
                <div class="text-white">
                    <h1 class="font-bold text-[28px]">123 456 789 0</h1>
                    <h1 class="text-[10px]">24-HOUR EMERGENCY ASSISTANCE</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="featured py-5 px-10 bg-[#A2001D] flex justify-between text-white">
        <div class="flex justify-between">
            <img src="/images/best-prices.png" alt="" class="w-[64px] mr-4">
            <div class="flex flex-col">
                <h1 class="text-[18px] font-bold">HARGA TERBAIK</h1>
                <p class="text-[16px]">Semua perbaikan dan layanan mekanis tersedia dengan harga terjangkau</p>
            </div>
        </div>
        <div class="flex justify-between">
            <img src="/images/best-prices.png" alt="" class="w-[64px] mr-4">
            <div class="flex flex-col">
                <h1 class="text-[18px] font-bold">HARGA TERBAIK</h1>
                <p class="text-[16px]">Semua perbaikan dan layanan mekanis tersedia dengan harga terjangkau</p>
            </div>
        </div>
        <div class="flex justify-between">
            <img src="/images/best-prices.png" alt="" class="w-[64px] mr-4">
            <div class="flex flex-col">
                <h1 class="text-[18px] font-bold">HARGA TERBAIK</h1>
                <p class="text-[16px]">Semua perbaikan dan layanan mekanis tersedia dengan harga terjangkau</p>
            </div>
        </div>
    </section>
    <section class="bio bg-white text-[#2B4448] px-[70px] py-[100px]">
        <div class="flex justify-between items-center mb-10">
            <img src="/images/pexels-artem-podrez-8985464 1.png" alt="" class="w-[574px] mr-10">
            <div class="flex flex-col">
                <div class="flex mb-5">
                    <img src="/images/Vector.png" alt="" class="w-[32px] mr-2">
                    <h1 class="text-[16px] text-[#1E5DBC]">LAYANAN KAMI MELIPUTI :</h1>
                </div>
                <p class="text-[18px] text-[#2B4448] text-justify leading-[28px] mb-5">Perawatan Berkala: Layanan
                    perawatan
                    rutin untuk menjaga performa optimal kendaraan Anda.
                </p>
                <p class="text-[18px] text-[#2B4448] text-justify leading-[28px] mb-5">
                    Perbaikan Mesin: Perbaikan dan penggantian komponen mesin untuk mengatasi masalah performa.
                </p>
                <p class="text-[18px] text-[#2B4448] text-justify leading-[28px] mb-5">
                    Servis Rem dan Suspensi: Perbaikan dan penggantian rem serta sistem suspensi untuk keamanan dan
                    kenyamanan berkendara.


                </p>
                <p class="text-[18px] text-[#2B4448] text-justify leading-[28px] mb-5">
                    Diagnostik Elektronik: Pengecekan dan perbaikan sistem elektronik menggunakan alat diagnostik
                    canggih.

                </p>
                <p class="text-[18px] text-[#2B4448] text-justify leading-[28px] mb-5">
                    Perbaikan Transmisi: Layanan perbaikan untuk transmisi manual dan otomatis.

                </p>

            </div>
        </div>
        <div class="flex justify-between items-center">
            <div class="flex flex-col">
                <div class="flex mb-5">
                    <img src="/images/Vector.png" alt="" class="w-[32px] mr-2">
                    <h1 class="text-[16px] text-[#1E5DBC]">LAYANAN KAMI MELIPUTI :</h1>
                </div>
                <p class="text-[18px] text-[#2B4448] text-justify leading-[28px] mb-5">Konsultasi Awal: Identifikasi
                    masalah dan diskusi solusi terbaik bersama teknisi kami.
                </p>
                <p class="text-[18px] text-[#2B4448] text-justify leading-[28px] mb-5">

                    Diagnostik Lengkap: Pemeriksaan menyeluruh menggunakan teknologi terkini.</p>
                <p class="text-[18px] text-[#2B4448] text-justify leading-[28px] mb-5">

                    Estimasi Biaya: Penawaran biaya transparan sebelum pekerjaan dimulai.


                </p>
                <p class="text-[18px] text-[#2B4448] text-justify leading-[28px] mb-5">
                    Perbaikan Profesional: Pelaksanaan perbaikan oleh teknisi bersertifikat.

                </p>
                <p class="text-[18px] text-[#2B4448] text-justify leading-[28px] mb-5">

                    Uji Kelayakan: Uji kendaraan setelah perbaikan untuk memastikan kualitas dan keamanan.
                </p>

            </div>
            <img src="/images/pexels-artem-podrez-8986037 1.png" alt="" class="w-[574px] ml-10">
        </div>
    </section>
    <section class="formn-container flex justify-center items-center py-[70px] border-2 border-[#A2001D]">
        <form id="serviceForm" class="w-[469px]" onsubmit="sendToWhatsApp(); return false;">
            <div class="header mb-10">
                <h1 class="text-[30px] font-semibold mb-2">Formulir Permintaan Servis Toyota Auto2000 HR Muhammad</h1>
                <p class="text-[18px] text-[#333333CC]">Silakan isi formulir berikut untuk menjadwalkan servis kendaraan Anda di Toyota Auto2000 HR Muhammad.</p>
            </div>
            <div>
                <input type="text" id="name" class="w-full rounded-sm p-4 bg-gray-100 mb-4" placeholder="NAMA" required>
                <input type="text" id="polisi" class="w-full rounded-sm p-4 bg-gray-100 mb-4" placeholder="NO POLISI" required>
                <input type="text" id="telepon" class="w-full rounded-sm p-4 bg-gray-100 mb-4" placeholder="NO TELEPON" required>
                <input type="date" id="tanggal" class="w-full rounded-sm p-4 bg-gray-100 mb-4" placeholder="TANGGAL" required>
                <input type="text" id="kendaraan" class="w-full rounded-sm p-4 bg-gray-100 mb-4" placeholder="JENIS KENDARAAN" required>
                <input type="text" id="rangka" class="w-full rounded-sm p-4 bg-gray-100 mb-4" placeholder="NO RANGKA" required>
                <button type="submit" class="font-semibold text-white bg-[#A2001D] rounded-lg py-4 text-center w-full">KIRIM</button>
            </div>
        </form>



    </section>
    @include('layouts.footer')
    <script>
        function sendToWhatsApp() {
            // Ambil data dari input form
            var name = document.getElementById('name').value;
            var polisi = document.getElementById('polisi').value;
            var telepon = document.getElementById('telepon').value;
            var tanggal = document.getElementById('tanggal').value;
            var kendaraan = document.getElementById('kendaraan').value;
            var rangka = document.getElementById('rangka').value;

            // Bentuk pesan yang akan dikirim ke WhatsApp
            var message =
                "Permintaan Servis:%0A" +
                "Nama: " + name + "%0A" +
                "No Polisi: " + polisi + "%0A" +
                "No Telepon: " + telepon + "%0A" +
                "Tanggal Servis: " + tanggal + "%0A" +
                "Jenis Kendaraan: " + kendaraan + "%0A" +
                "No Rangka: " + rangka;

            // Nomor WhatsApp tujuan
            var phoneNumber = "628123456789"; // ganti dengan nomor WhatsApp Anda

            // Redirect ke WhatsApp dengan URL yang dihasilkan
            var whatsappURL = "https://wa.me/" + phoneNumber + "?text=" + message;
            window.open(whatsappURL, '_blank');
        }
    </script>
</body>

</html>
