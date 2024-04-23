<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LocationCsrModels;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LocationCSR extends Controller
{
    function index()
    {
        $location = LocationCsrModels::get();
        return view('partials.admin.location_csr.index', compact('location'));
    }

    function create()
    {
        return view('partials.admin.location_csr.create');
    }

    function createData(Request $request)
    {
        LocationCsrModels::create([
            'lokasi' => $request->input('lokasi'),
        ]);
        Alert::success('Berhasil', 'Lokasi grapari berhasil ditambahkan.');
        return redirect('/admin/location-csr');
    }
}
