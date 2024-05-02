<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use App\Models\CSRModels;
use Illuminate\Http\Request;

class CSRViewerControllers extends Controller
{
    function index()
    {
        $data = CSRModels::select('keloladata.*', 'location_csr.lokasi')
            ->join('location_csr', 'location_csr.id', '=', 'keloladata.id_location_csr')
            ->get();
        return view('partials.viewer.keloladata.index', compact('data'));
    }
}
