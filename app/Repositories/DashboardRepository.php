<?
namespace App\Repositories;

use App\Models\Frame;
use App\Models\Lensa;
use App\Models\Pasien;
use App\Models\Employee;

class DashboardRepository implements DashboardRepositoryInterface
{
    public function getCounts()
    {
        return [
            'pasiens_count' => Pasien::count(),
            'lensas_count' => Lensa::count(),
            'frames_count' => Frame::count(),
            'employees_count' => Employee::count(),
        ];
    }
}
