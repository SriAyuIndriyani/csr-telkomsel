<?php

use App\Http\Controllers\LoginControllers;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
   Route::get('/', function () {
      return view('login');
   });
   Route::post('/', [LoginControllers::class, 'authLogin']);
});