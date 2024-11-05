@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <form action="" class="flex flex-col justify-center space-y-4">
            <a href="" class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-blue-300 text-white">
                <img src="" alt="" class="h-[20px] w-[20px] bg-white">
                <p class="text-[18px] font-semibold">Kembali</p>
            </a>
            <div class="flex flex-col space-y-3">
                <p class="text-[14px] text-gray-700">Jenis Kendaraan</p>
                <input type="text" name="" id="" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
            </div>
            <div class="flex flex-col space-y-3">
                <p class="text-[14px] text-gray-700">Warna</p>
                <input type="text" name="" id="" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
            </div>
            <div class="flex flex-col space-y-3">
                <p class="text-[14px] text-gray-700">Stok</p>
                <input type="text" name="" id="" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
            </div>
            <div class="flex flex-col space-y-3">
                <p class="text-[14px] text-gray-700">Harga</p>
                <input type="text" name="" id="" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
            </div>
            <div class="flex flex-col space-y-3">
                <p class="text-[14px] text-gray-700">Deskripsi</p>
                <input type="text" name="" id="" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
            </div>
            <div class="flex flex-col space-y-3">
                <p class="text-[14px] text-gray-700">Foto</p>
                <input type="file" name="" id="" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700">
            </div>
            <button type="sumbit" class="flex justify-center w-fit rounded-lg space-x-2 items-center px-2 py-3 bg-green-700 text-white">
                <img src="" alt="" class="h-[20px] w-[20px] bg-white">
                <p class="text-[18px] font-semibold">Sumbit</p>
            </button>
        </form>
    </div>
@endsection
