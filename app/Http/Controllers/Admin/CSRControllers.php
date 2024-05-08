<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CSRDownload;
use App\Http\Controllers\Controller;
use App\Models\CSRModels;
use App\Models\LocationCsrModels;
use App\Models\UsersModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class CSRControllers extends Controller
{
    function index()
    {
        $data = CSRModels::select('keloladata.*', 'location_csr.lokasi')
            ->join('location_csr', 'location_csr.id', '=', 'keloladata.id_location_csr')
            ->get();
        $location = LocationCsrModels::get();
        $title = 'Hapus Data PC/Laptop!';
        $text = "Apakah anda yakin ingin menghapus data PC atau Laptop ini?";
        confirmDelete($title, $text);
        return view('partials.admin.keloladata.index', compact('data', 'location'));
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

    function download(Request $request)
    {
        $id = $request->input('location');
        if ($id == null) {
            $data = CSRModels::select('keloladata.nama', 'keloladata.jabatan', 'keloladata.type', 'keloladata.hostname', 'keloladata.ssd', 'keloladata.winver', 'keloladata.processor', 'keloladata.antivirus', 'keloladata.ram', 'location_csr.lokasi')
                ->join('location_csr', 'location_csr.id', '=', 'keloladata.id_location_csr')
                ->orderBy('keloladata.id_location_csr', 'ASC')
                ->get()
                ->toArray();
        } else {
            $data = CSRModels::select('keloladata.nama', 'keloladata.jabatan', 'keloladata.type', 'keloladata.hostname', 'keloladata.ssd', 'keloladata.winver', 'keloladata.processor', 'keloladata.antivirus', 'keloladata.ram', 'location_csr.lokasi')
                ->where('id_location_csr', $id)
                ->join('location_csr', 'location_csr.id', '=', 'keloladata.id_location_csr')
                ->orderBy('keloladata.id_location_csr', 'ASC')
                ->get()
                ->toArray();
        }

        // Export data ke dalam file Excel
        return Excel::download(new CSRDownload($data), 'keloladata.xlsx');
    }
}