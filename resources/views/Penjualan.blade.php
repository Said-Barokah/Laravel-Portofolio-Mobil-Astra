@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <section class="flex space-x-4 justify-evenly">
            <div class="flex justify-between items-center space-x-3">
                <p class="text-[14px]">Show</p>
                <select name="" id="" class="p-2 bg-gray-300 rounded-lg text-[14px]">
                    <option value="">1</option>
                    <option value="">2</option>
                </select>
                <p class="text-[14px]">entries</p>
            </div>
            <div class="w-full">
                <form action="" class="relative">
                    <input type="text" class="border-2 border-gray-300 p-3 rounded-md pl-[40px] w-full"
                        placeholder="Search...">
                    <img src="" alt=""
                        class="bg-gray-200 h-[20px] w-[20px] absolute top-[14px] left-[10px]">
                </form>
            </div>
        </section>
        <div class="flex w-full justify-end items-center my-2">
            <a href="" class="bg-blue-500 flex space-x-3 justify-center items-center p-1">
                <p class="text-white font-semibold text-lg rounded-md p-2">+ Tambah</p>
            </a>
        </div>
        <table class="table-auto">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-left">Jenis Kendaraan</th>
                    <th class="text-left">Warna</th>
                    <th class="text-left">No Rangka</th>
                    <th class="text-left">Total</th>
                    <th class="text-left">Tanggal</th>
                    <th class="text-center">No Mesin</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="bg-blue-50">
                <tr>
                    <td class="px-5">1</td>
                    <td class="ml-2 pr-2">Yulianik</td>
                    <td class="ml-2 pr-2">AGYA 1.2 M/T ONE TONE</td>
                    <td class="pr-5">SUPER WHITE II</td>
                    <td class="pr-5">MHKAAJVY3121</td>
                    <td class="pr-5">1.000.000.000</td>
                    <td class="pr-5">01/04/2001</td>
                    <td class="pr-5">11.52/2500</td>
                    <td class="flex space-x-5 px-5">
                        <img src="" alt="" class="bg-gray w-[30px] h-[30px]">
                        <img src="" alt="" class="bg-gray w-[30px] h-[30px]">
                    </td>
                </tr>
                <tr>
                    <td class="px-5">1</td>
                    <td class="ml-2 pr-2">Yulianik</td>
                    <td class="ml-2 pr-2">AGYA 1.2 M/T ONE TONE</td>
                    <td class="pr-5">SUPER WHITE II</td>
                    <td class="pr-5">MHKAAJVY3121</td>
                    <td class="pr-5">1.000.000.000</td>
                    <td class="pr-5">01/04/2001</td>
                    <td class="pr-5">11.52/2500</td>
                    <td class="flex space-x-5 px-5">
                        <img src="" alt="" class="bg-gray w-[30px] h-[30px]">
                        <img src="" alt="" class="bg-gray w-[30px] h-[30px]">
                    </td>
                </tr>
                <tr>
                    <td class="px-5">1</td>
                    <td class="ml-2 pr-2">Yulianik</td>
                    <td class="ml-2 pr-2">AGYA 1.2 M/T ONE TONE</td>
                    <td class="pr-5">SUPER WHITE II</td>
                    <td class="pr-5">MHKAAJVY3121</td>
                    <td class="pr-5">1.000.000.000</td>
                    <td class="pr-5">01/04/2001</td>
                    <td class="pr-5">11.52/2500</td>
                    <td class="flex space-x-5 px-5">
                        <img src="" alt="" class="bg-gray w-[30px] h-[30px]">
                        <img src="" alt="" class="bg-gray w-[30px] h-[30px]">
                    </td>
                </tr>
            </tbody>
        </table>
        <section class="flex justify-center items-center space-x-4 mt-6">
            <a href="" class="text-[14px] text-gray-500">Previous</a>
            <a href="" class="p-3 bg-blue-500 text-white rounded-md">1</a>
            <a href="" class="p-3 bg-blue-500 text-white rounded-md">2</a>
            <a href="" class="p-3 bg-blue-500 text-white rounded-md">3</a>
            <a href="" class="text-[14px] text-gray-500">Next</a>
        </section>
    </div>
@endsection
