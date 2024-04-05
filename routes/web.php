<?php

use App\Http\Controllers\Admin\CSRControllers;
use App\Http\Controllers\Admin\DashboardAdminControllers;
use App\Http\Controllers\Admin\UserAdminControllers;
use App\Http\Controllers\LoginControllers;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
   Route::get('/', function () {
      return view('login');
   });
   Route::post('/', [LoginControllers::class, 'authLogin']);
});


Route::middleware('auth:web')->group(function () {
   /**
    * Fungsi Untuk Log Out
    */
   Route::get('/log-out', [LoginControllers::class, 'logout']);
   /**
    * Route Untuk ID Role 1 yaitu ADMIN
    */
   Route::middleware('check.user:1')->group(function () {
      Route::group(['prefix' => 'admin'], function () {
         // Dashboard
         Route::get('/dashboard', [DashboardAdminControllers::class, 'index']);
         // Semua Pengguna
         Route::get('/all-user', [UserAdminControllers::class, 'index']);
         Route::get('/all-user/create', [UserAdminControllers::class, 'create']);
         Route::post('/all-user/createData', [UserAdminControllers::class, 'createData']);
         Route::get('/all-user/update/{id}', [UserAdminControllers::class, 'update']);
         Route::post('/all-user/updateData/{id}', [UserAdminControllers::class, 'updateData']);
         Route::delete('/all-user/delete/{id}', [UserAdminControllers::class, 'delete']);
         // Kelola Data
         Route::get('/kelola-data', [CSRControllers::class, 'index']);
         Route::get('/kelola-data/create', [CSRControllers::class, 'create']);
         Route::post('/kelola-data/createData', [CSRControllers::class, 'createData']);

      });
   });
   /**
    * Route Untuk ID Role 2 yaitu User
    */
   Route::middleware('check.user:2')->group(function () {
      Route::group(['prefix' => 'viewer'], function () {
         // Dashboard
         Route::get('/dashboard', function () {
            return "Halaman Viewer";
         });
         // Route::get('/dashboard', [DashboardUserControllers::class, 'index']);
      });
   });
});
