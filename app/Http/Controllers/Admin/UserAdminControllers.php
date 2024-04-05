<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UsersModels;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserAdminControllers extends Controller
{
    function index()
    {
        $user = UsersModels::where('id_role', 2)->get();
        $title = 'Hapus Data Pengguna!';
        $text = "Apakah anda yakin ingin menghapus data pengguna ini?";
        confirmDelete($title, $text);
        return view('partials.admin.alluser.index', compact('user'));
    }

    function create()
    {
        return view('partials.admin.alluser.create');
    }
    function createData(Request $request)
    {
        $hashPassword = bcrypt($request->input('password'));
        UsersModels::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'password' => $hashPassword,
            'id_role' => 2,
        ]);
        Alert::success('Berhasil!', 'Pengguna Berhasil Ditambahkan!');
        return redirect('admin/all-user');
    }

    function update($id)
    {
        $user = UsersModels::find($id);
        return view('partials.admin.alluser.update', compact('user'));
    }

    function updateData(Request $request, $id)
    {
        $id_role = 2;
        if ($request->password != null) {
            $hash = bcrypt($request->input('password'));
            UsersModels::where('id', $id)
                ->update([
                    'id_role' => $id_role,
                    'name' => $request->input('name'),
                    'username' => $request->input('username'),
                    'password' => $hash,
                ]);
        } else {
            UsersModels::where('id', $id)
                ->update([
                    'id_role' => $id_role,
                    'name' => $request->input('name'),
                    'username' => $request->input('phone'),
                ]);
        }

        Alert::success('Berhasil', 'Pengguna Berhasil Diperbarui.');
        return redirect('/admin/all-user');
    }

    function delete(Request $request, $id)
    {
        UsersModels::where('id', $id)->delete();
        Alert::success('Berhasil', 'Pengguna Berhasil Dihapus');
        return redirect('/admin/all-user');
    }
}
