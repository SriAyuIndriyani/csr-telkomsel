<?php

namespace App\Http\Controllers;

use App\Models\UsersModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginControllers extends Controller
{
    public function authLogin(Request $request)
    {
        $infoLogin = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        // Pengecekan apakah username ada di database
        $userExists = UsersModels::where('username', $infoLogin['username'])->exists();
        if (!$userExists) {
            // username tidak terdaftar
            Alert::error('Gagal', 'Akun Anda Belum Terdaftar, Silahkan Hubungi Admin Untuk Melakukan Pendaftaran Akun!.');
            return redirect('/')->withErrors('Akun belum terdaftar. Silakan daftar terlebih dahulu.')->withInput();
        }
        if (Auth::guard('web')->attempt($infoLogin)) {
            $user = Auth::guard('web')->user();
            $userWithRole = UsersModels::join('roles', 'users.id_role', '=', 'roles.id')
                ->select('users.*', 'roles.role')
                ->where('users.id', $user->id)
                ->first();
            $role = strtolower($userWithRole->role);
            // Admin
            if (strcasecmp($role, 'Admin') === 0 || strcasecmp($role, 'admin') === 0) {
                session([
                    'user' => [
                        'id' => $userWithRole->id,
                        'id_role' => $userWithRole->id_role,
                        'username' => $userWithRole->username,
                    ]
                ]);
                return redirect('/admin/dashboard');
            }
            // Pengguna
            elseif (strcasecmp($role, 'Viewer') === 0 || strcasecmp($role, 'viewer') === 0) {
                session([
                    'user' => [
                        'id' => $userWithRole->id,
                        'id_role' => $userWithRole->id_role,
                        'name' => $userWithRole->name,
                    ]
                ]);
                return redirect('/viewer/profile');
            }
            // Selain Di Atas
            else {
                Auth::guard('web')->logout();
                Session::forget('user');
                return redirect('/');
            }
        }
        Alert::error('Gagal', 'Password Yang Anda Masukkan Salah, Coba Lagi!.');
        return redirect('/');
    }

    public function logout(Request $request)
    {
        // Mendapatkan informasi pengguna sebelum logout
        $user = auth()->user();

        // Logout pengguna
        Auth::guard('web')->logout();

        // Menghapus sesi pengguna
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Menyimpan informasi pengguna dalam sesi untuk referensi
        Session::put('user', [
            'id' => $user->id,
            'id_role' => $user->id_role,
            'username' => $user->username,
        ]);

        // Redirect ke halaman login
        return redirect('/');
    }

}