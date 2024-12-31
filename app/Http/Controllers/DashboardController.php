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
    protected $dashboardRepository;

    public function __construct(DashboardRepositoryInterface $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }

    public function index()
    {
        $counts = $this->dashboardRepository->getCounts();
        return view('admin.dashboard.index', $counts);
    }
}
