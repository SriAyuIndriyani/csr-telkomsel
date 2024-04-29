<?php

use App\Http\Controllers\Admin\CSRControllers;
use App\Http\Controllers\Admin\DashboardAdminControllers;
use App\Http\Controllers\Admin\LocationCSR;
use App\Http\Controllers\Admin\ProfileControllers;
use App\Http\Controllers\Admin\UserAdminControllers;
use App\Http\Controllers\LoginControllers;
use App\Http\Controllers\Viewer\CSRViewerControllers;
use App\Http\Controllers\Viewer\ProfileViwerControllers;
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
         // Dashoard
         Route::get('/dashboard', [DashboardAdminControllers::class, 'index']);
         Route::get('/dashboard/data', [DashboardAdminControllers::class, 'data']);
         // Profile
         Route::get('/profile', [ProfileControllers::class, 'index']);
         Route::put('/profile/updateProfile', [ProfileControllers::class, 'storeProfile']);
         Route::put('/profile/updatePassword', [ProfileControllers::class, 'storePassword']);
         // Semua Pengguna
         Route::get('/all-user', [UserAdminControllers::class, 'index']);
         Route::get('/all-user/create', [UserAdminControllers::class, 'create']);
         Route::post('/all-user/createData', [UserAdminControllers::class, 'createData']);
         Route::get('/all-user/update/{id}', [UserAdminControllers::class, 'update']);
         Route::post('/all-user/updateData/{id}', [UserAdminControllers::class, 'updateData']);
         Route::delete('/all-user/delete/{id}', [UserAdminControllers::class, 'delete']);
         // Location CSR
         Route::get('/location-csr', [LocationCSR::class, 'index']);
         Route::get('/location-csr/create', [LocationCSR::class, 'create']);
         Route::post('/location-csr/createData', [LocationCSR::class, 'createData']);
         Route::get('/location-csr/update/{id}', [LocationCSR::class, 'update']);
         Route::post('/location-csr/updateData/{id}', [LocationCSR::class, 'updateData']);
         Route::get('/location-csr/delete/{id}', [LocationCSR::class, 'delete']);
         // Kelola Data
         Route::get('/kelola-data', [CSRControllers::class, 'index']);
         Route::get('/kelola-data/create', [CSRControllers::class, 'create']);
         Route::post('/kelola-data/createData', [CSRControllers::class, 'createData']);
         Route::get('/kelola-data/update/{id}', [CSRControllers::class, 'update']);
         Route::post('/kelola-data/updateData/{id}', [CSRControllers::class, 'updateData']);
         Route::delete('/kelola-data/delete/{id}', [CSRControllers::class, 'delete']);
      });
   });
   /**
    * Route Untuk ID Role 2 yaitu User
    */
   Route::middleware('check.user:2')->group(function () {
      Route::group(['prefix' => 'viewer'], function () {
         // Profile
         Route::get('/profile', [ProfileViwerControllers::class, 'index']);
         Route::put('/profile/updateProfile', [ProfileViwerControllers::class, 'storeProfile']);
         Route::put('/profile/updatePassword', [ProfileViwerControllers::class, 'storePassword']);
         // Kelola Data
         Route::get('/cek-data', [CSRViewerControllers::class, 'index']);
      });
   });
});