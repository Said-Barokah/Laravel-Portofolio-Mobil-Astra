@extends('layouts.sidebar')

@section('content')
    <div class="container">
        @extends('layouts.SuccessAlert')
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
            <a href="{{ route('payment.create') }}" class="bg-blue-500 flex space-x-3 justify-center items-center p-1">
                <p class="text-white font-semibold text-lg rounded-md p-2">+ Tambah Pembayaran</p>
            </a>
        </div>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="text-left">Customer</th>
                    <th class="text-left">Tipe Mobil</th>
                    <th class="text-left">No Mesin</th>
                    <th class="text-left">Total Pembayaran</th>
                    <th class="text-left">Tanggal Pembayaran</th>
                    <th class="text-left">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="bg-blue-50">
                @foreach ($payments as $index => $payment)
                <tr class="text-center">
                    <td class="px-5 align-middle">{{ $index + 1 }}</td>
                    <td class="ml-2 align-middle">{{ $payment->booking->customer->name }}</td><!-- Menampilkan nomor urut -->

                    <!-- Nama Admin -->
                    <td class="ml-2 align-middle">{{ $payment->booking->vehicleDetail->vehicleColor->vehicle->name}}</td>
                    <td class="ml-2 align-middle">{{ $payment->booking->vehicleDetail->chassis_number}}</td>

                    <!-- Nama Service Advisor -->

                    <!-- Nama Sales -->

                    <!-- ID Booking -->


                    <!-- Total Pembayaran dalam format uang -->
                    <td class="pr-5 align-middle">Rp. {{ number_format($payment->total_payment, 0, ',', '.') }}</td>

                    <!-- Metode Pembayaran -->

                    <!-- Tanggal Pembayaran -->
                    <td class="pr-5 align-middle">{{ $payment->created_at->format('Y-m-d') }}</td>

                    <!-- Status -->
                    <td class="pr-5 align-middle">{{ $payment->status }}</td>

                    <!-- Ikon untuk edit dan hapus -->
                    <td class="px-5 align-middle">
                        <div class="flex space-x-5 justify-center items-center">
                            <!-- Link Hapus -->
                            <form action="{{ route('payment.destroy', ['payment' => $payment->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pembayaran ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <img src="/images/trash-2 2.png" alt="Hapus" class="h-[20px] w-auto">
                                </button>
                            </form>
                            <a href="{{ route('payment.edit', ['payment' => $payment->id]) }}">
                                <img src="/images/edit (1) 2.png" alt="Edit" class="h-[20px] w-auto">
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <section class="flex justify-center items-center space-x-4 mt-6">
            <!-- Pagination links -->
            {{ $payments->links('vendor.pagination.tailwind') }}
        </section>
    </div>
@endsection
