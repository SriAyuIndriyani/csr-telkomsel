<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardAdminControllers extends Controller
{
    function index()
    {
        return view('partials.admin.dashboard.index');
    }
}
