<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use App\Models\CSRModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardViewersControllers extends Controller
{
    function index()
    {
        return view('partials.viewer.dashboard.index');
    }

    function data()
    {
        $data = CSRModels::select('location_csr.lokasi', 'location_csr.warna', DB::raw('COUNT(keloladata.id_location_csr) as jumlah'))
            ->join('location_csr', 'location_csr.id', '=', 'keloladata.id_location_csr')
            ->groupBy('location_csr.lokasi', 'location_csr.warna')
            ->get();

        $labels = $data->pluck('lokasi');
        $datasets = $data->pluck('jumlah');

        // Definisikan array warna yang akan digunakan
        $colors = $data->pluck('warna');

        $result = [
            'labels' => $labels,
            'datasets' => [
                [
                    'data' => $datasets,
                    'backgroundColor' => $colors, // Gunakan array warna
                    'borderColor' => '#fff' // Atur warna sesuai kebutuhan Anda
                ]
            ]
        ];

        return response()->json($result);
    }
}
