<?php

namespace App\Http\Controllers;
use App\Models\Users;
use App\Models\Konsultasi;
use App\Models\Pendampingan;
use App\Models\Jadwal;
use App\Models\DetailJadwal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard_admin()
    {
        $k = Konsultasi::count('id');
        $p = Pendampingan::count('id');
        $j = DetailJadwal::count('id');
        $up = Users::where('role', 'users')->count('id');
        $ua = Users::where('role', 'admin')->count('id');
        return view('admin.dashboard', compact('k', 'p', 'j', 'up', 'ua'));
    }

    public function dashboard_users()
    {
        $k = Konsultasi::count('id');
        $p = Pendampingan::count('id');
        $j = DetailJadwal::count('id');
        $up = Users::where('role', 'users')->count('id');
        $ua = Users::where('role', 'admin')->count('id');
        return view('users.dashboard', compact('k', 'p', 'j', 'up', 'ua'));
    }
}
