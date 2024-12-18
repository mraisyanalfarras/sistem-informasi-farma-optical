<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\frame;
use App\Models\lensa;
use App\Models\Pasien;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pasiens_count = Pasien::count();
        $lensas_count = Lensa::count(); 
        $frames_count = Frame::count();

        return view('admin.dashboard.index', compact('pasien_count', 'lensas_count', 'frames_count'));
    }
}
