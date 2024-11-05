@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <h1 class="mt-4 text-3xl font-semibold text-gray-800">Dashboard</h1>
        <p class="text-lg text-gray-600">Laporan Data Penjualan</p>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <canvas id="salesChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <section class="container mx-auto p-6 font-mono">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr
                                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Tipe Kendaraan</th>
                                <th class="px-4 py-3">Jumlah</th>
                                <th class="px-4 py-3">Total Price</th>
                                <th class="px-4 py-3">Tanggal Pembayaran</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($sales as $index => $sale)


                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">
                                        <div class="flex items-center text-sm">
                                            <div class="w-8 h-8 mr-3 rounded-full md:block">
                                                <p class="font-semibold text-black">{{ $index + 1 }}</p>
                                            </div>
                                            <p class="font-semibold text-black">{{ $sale->vehicle->name }}</p>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-ms font-semibold border">{{ $sale->quantity }}</td>
                                    <td class="px-4 py-3 text-xs border">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">
                                            {{ $sale->total_price }} </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm border">{{ $sale->date }}</td>
                                    <td class="py-2 px-4">
                                        <a href="#" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                                        <a href="#" class="text-red-500 hover:text-red-700">Hapus</a>
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <script>
        var ctx = document.getElementById('salesChart').getContext('2d');

        var salesData = {!! json_encode($salesData) !!};

        var salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: salesData.years,
                datasets: [{
                    label: 'Penjualan Kendaraan Per Tahun',
                    data: salesData.sales,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection
