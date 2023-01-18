<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\PemilikKost;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {   
        $kosts = Kost::paginate(4)->withQueryString();
        $pemilik = PemilikKost::all();
        $user = User::all();
        return view('admin.dashboard.index', compact('kosts', 'pemilik', 'user'));
    }
}
