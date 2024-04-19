<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UsersModels;
use Illuminate\Http\Request;
use Auth;
use Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileControllers extends Controller
{
    function index()
    {
        $user = Auth::user();
        return view(
            'partials.admin.profile.index',
            [
                'user' => $user,
            ]
        );
    }

    function storeProfile(Request $request)
    {
        $id_user = Auth::user()->id;
        UsersModels::where('id', $id_user)
            ->update([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
            ]);
        toast('Berhasil perbarui data profile!', 'success');
        return redirect("/admin/profile#profile-edit");
    }

    function storePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);
        $newPassword = hash::make($request->input('password'));
        $user = Auth::user();
        $user->password = $newPassword;
        $user->save();
        if ($user) {
            Alert::success('Berhasil!', 'Password berhasil diperbarui!');
            return redirect('/admin/profile');
        } else {
            Alert::error('Gagal!', 'Password gagal diperbarui!');
            return redirect('/admin/profile');
        }
    }
}
