<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CSRModels;
use App\Models\LocationCsrModels;
use App\Models\UsersModels;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class CSRControllers extends Controller
{
    function index()
    {
        $data = CSRModels::select('keloladata.*', 'location_csr.lokasi')
            ->join('location_csr', 'location_csr.id', '=', 'keloladata.id_location_csr')
            ->get();
        $title = 'Hapus Data PC/Laptop!';
        $text = "Apakah anda yakin ingin menghapus data PC atau Laptop ini?";
        confirmDelete($title, $text);
        return view('partials.admin.keloladata.index', compact('data'));
    }

    function create()
    {
        $location = LocationCsrModels::get();
        return view('partials.admin.keloladata.create', compact('location'));
    }

    function createData(Request $request)
    {
        $id = Auth::user()->id;
        CSRModels::create([
            'id_admin' => $id,
            'nama' => $request->input('nama'),
            'id_location_csr' => $request->input('lokasi'),
            'jabatan' => $request->input('jabatan'),
            'type' => $request->input('type'),
            'hostname' => $request->input('hostname'),
            'ssd' => $request->input('ssd'),
            'winver' => $request->input('winver'),
            'processor' => $request->input('processor'),
            'antivirus' => $request->input('antivirus'),
            'ram' => $request->input('ram'),
        ]);
        Alert::success('Berhasil', 'Data Laptop Berhasil Ditambahkan.');
        return redirect('/admin/kelola-data');
    }

    function update($id)
    {
        $data = CSRModels::find($id);
        $location = LocationCsrModels::get();
        return view('partials.admin.keloladata.update', compact('data', 'location'));
    }

    function updateData(Request $request, $id)
    {
        CSRModels::where('id', $id)->update([
            'nama' => $request->input('nama'),
            'id_location_csr' => $request->input('lokasi'),
            'jabatan' => $request->input('jabatan'),
            'type' => $request->input('type'),
            'hostname' => $request->input('hostname'),
            'ssd' => $request->input('ssd'),
            'winver' => $request->input('winver'),
            'processor' => $request->input('processor'),
            'antivirus' => $request->input('antivirus'),
            'ram' => $request->input('ram'),
        ]);
        Alert::success('Berhasil!', 'Data Laptop Berhasil Diperbarui.');
        return redirect('/admin/kelola-data');
    }

    function delete($id)
    {
        CSRModels::where('id', $id)->delete();
        Alert::success('Berhasil!', 'Data Laptop Berhasil Dihapus.');
        return redirect('/admin/kelola-data');
    }
}