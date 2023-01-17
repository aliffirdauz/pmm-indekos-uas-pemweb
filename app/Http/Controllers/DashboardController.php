<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\PemilikKost;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {   
        $kosts = Kost::all();   
        return view('admin.dashboard.index', compact('kosts'));
    }
}
