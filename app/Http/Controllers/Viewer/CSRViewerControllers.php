<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use App\Models\CSRModels;
use Illuminate\Http\Request;

class CSRViewerControllers extends Controller
{
    function index()
    {
        $data = CSRModels::get();
        return view('partials.viewer.keloladata.index', compact('data'));
    }
}
