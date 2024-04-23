<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CSRModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardAdminControllers extends Controller
{
    function index()
    {
        return view('partials.admin.dashboard.index');
    }

    function data()
    {
        $data = CSRModels::select('location_csr.lokasi', DB::raw('COUNT(keloladata.id_location_csr) as jumlah'))
            ->join('location_csr', 'location_csr.id', '=', 'keloladata.id_location_csr')
            ->groupBy('location_csr.lokasi')
            ->get();

        $labels = $data->pluck('lokasi');
        $datasets = $data->pluck('jumlah');

        // Definisikan array warna yang akan digunakan
        $colors = ['#2ab57d', '#ebeff2', '#4a81d4', '#ff5733', '#ffa500', '#800080', '#008080', '#00ff00', '#0000ff', '#ff00ff'];

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
