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
        $title = 'Hapus Data Pengguna!';
        $text = "Apakah anda yakin ingin menghapus data pengguna ini?";
        confirmDelete($title, $text);
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
            'warna' => $request->input('warna'),
        ]);
        Alert::success('Berhasil', 'Lokasi grapari berhasil ditambahkan.');
        return redirect('/admin/location-csr');
    }
    function update($id)
    {
        $location_csr = LocationCsrModels::find($id);
        return view('partials.admin.location_csr.update', compact('location_csr'));
    }

    function updateData(Request $request, $id)
    {
        LocationCsrModels::where('id', $id)
            ->update([
                'lokasi' => $request->input('lokasi'),
                'warna' => $request->input('warna'),
            ]);
        Alert::success('Berhasil', 'Lokasi grapari berhasil diperbarui.');
        return redirect('/admin/location-csr');
    }

    function delete($id)
    {
        LocationCsrModels::where('id', $id)->delete();
        Alert::success('Berhasil', 'Lokasi grapari berhasil dihapus.');
        return redirect('/admin/location-csr');

    }
}
