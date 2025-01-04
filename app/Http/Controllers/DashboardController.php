<?php

namespace App\Http\Controllers;

use App\Models\Frame;
use App\Models\Lensa;
use App\Models\Pasien;
use App\Models\Employee;

use App\Repositories\DashboardRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $frameCounts = [
            'total' => Frame::count(),
        ];

        $lensaCounts = [
            'total' => Lensa::count(),

        ];

        $pasienCounts = [
            'total' => Pasien::count(),
            // Add additional conditions if applicable for Pasien
        ];

        $employeeCounts = [
            'total' => Employee::count(),
            // Add additional conditions if applicable for Employee
        ];

        return view('dashboard.index', compact('frameCounts', 'lensaCounts', 'pasienCounts', 'employeeCounts'));
    }
}
