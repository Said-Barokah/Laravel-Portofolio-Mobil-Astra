@extends('layouts.sidebar')

@section('content')
    <div class="container">
        @extends('layouts.BookingCreate')


        <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col justify-center space-y-4">
            @csrf
            <div class="flex flex-col space-y-3">
                <label for="name" class="text-[14px] text-gray-700">Nama Lengkap</label>
                <input name="name" id="name" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required/>
            </div>
            <div class="flex flex-col space-y-3">
                <label for="phone_number_cust" class="text-[14px] text-gray-700">Nomer Telepon</label>
                <input name="phone_number_cust" id="phone_number_cust" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" required/>
            </div>
            <div class="flex flex-col space-y-3">
                <label for="email" class="text-[14px] text-gray-700">Email</label>
                <input name="email" id="email" type="email" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" />
            </div>
            <div class="flex flex-col space-y-3">
                <label for="password" class="text-[14px] text-gray-700">Password</label>
                <input name="password" id="password" type="password" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" />
            </div>
            <div class="flex flex-col space-y-3">
                <label for="confirm_password" class="text-[14px] text-gray-700">Konfirmasi Password</label>
                <input name="confirm_password" id="confirm_password" type="password" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" />
                </select>
            </div>
            <div class="flex flex-col space-y-3">
                <label for="address" class="text-[14px] text-gray-700">Alamat</label>
                <textarea name="address_cust" id="address" type="password" class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700"></textarea>
            </div>
            <div class="flex flex-col space-y-3">
                <label for="photo" class="text-[14px] text-gray-700">Foto</label>
                <input type="file" name="photo_cust" id="photo"
                    class="w-full border-2 border-gray-200 rounded-lg p-3 text-gray-700" accept="image/*" >
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


    </script>
@endsection
