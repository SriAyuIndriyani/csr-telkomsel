<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginControllers extends Controller
{
    public function authLogin(Request $request)
    {
        $infoLogin = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        if (Auth::guard('web')->attempt($infoLogin)) {
            $user = Auth::guard('web')->user();
            $userWithRole = UsersModels::join('roles', 'users.id_role', '=', 'roles.id_role')
                ->select('users.*', 'roles.role')
                ->where('users.id', $user->id)
                ->first();
            $role = strtolower($userWithRole->role);
            if (strcasecmp($role, 'Admin') === 0 || strcasecmp($role, 'admin') === 0) {
                session([
                    'user' => [
                        'id' => $userWithRole->id,
                        'id_role' => $userWithRole->id_role,
                        'username' => $userWithRole->username,
                    ]
                ]);
                return redirect('/admin/dashboard');
            } elseif (strcasecmp($role, 'User') === 0 || strcasecmp($role, 'user') === 0) {
                session([
                    'user' => [
                        'id' => $userWithRole->id,
                        'id_role' => $userWithRole->id_role,
                        'name' => $userWithRole->name,
                    ]
                ]);
                return redirect('/user/dashboard')->with('showSuccessModal', true);
            } else {
                Auth::guard('web')->logout();
                Session::forget('user');
                return redirect('/')->withErrors('Anda tidak diizinkan masuk')->withInput();
            }
        }
        return redirect('/')->with('error', 'E-Mail atau Password yang anda masukkan salah!.');
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