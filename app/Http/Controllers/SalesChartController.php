<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleSales;


class SalesChartController extends Controller
{
    public function index(){
        $sales = VehicleSales::all();
        $salesData = $this->getVehicleSalesData();
        return view('VehicleSales', compact('sales','salesData'));
    }

    private function getVehicleSalesData()
    {
        // Contoh sederhana untuk mendapatkan data penjualan per tahun
        $sales = VehicleSales::selectRaw('YEAR(date) AS year, COUNT(*) AS total_sales')
                             ->groupBy('year')
                             ->orderBy('year')
                             ->get();

        $years = $sales->pluck('year')->toArray();
        $totalSales = $sales->pluck('total_sales')->toArray();

        return [
            'years' => $years,
            'sales' => $totalSales,
        ];
    }


}
