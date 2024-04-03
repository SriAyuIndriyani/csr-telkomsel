<?php

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
         Route::get('/dashboard', function () {
            return "Halaman Admin";
         });
         // Route::get('/dashboard', [DashboardAdminControllers::class, 'index']);
         // Route::get('/dashboard/calendar', [DashboardAdminControllers::class, 'calendar']);
      });
   });
   /**
    * Route Untuk ID Role 2 yaitu User
    */
   Route::middleware('check.user:2')->group(function () {
      Route::group(['prefix' => 'user'], function () {
         // Dashboard
         Route::get('/dashboard', function () {
            return "Halaman Viewer";
         });
         // Route::get('/dashboard', [DashboardUserControllers::class, 'index']);
      });
   });
});
