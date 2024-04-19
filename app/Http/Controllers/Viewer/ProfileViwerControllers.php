<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use App\Models\UsersModels;
use Illuminate\Http\Request;
use Auth;
use Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileViwerControllers extends Controller
{
    function index()
    {
        $user = Auth::user();
        return view(
            'partials.viewer.profile.index',
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
        return redirect("/viewer/profile#profile-edit");
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
            return redirect('/viewer/profile');
        } else {
            Alert::error('Gagal!', 'Password gagal diperbarui!');
            return redirect('/viewer/profile');
        }
    }
}
