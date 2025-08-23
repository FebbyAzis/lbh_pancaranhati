<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\DetailJadwal;
use App\Models\Pendampingan;
use App\Models\Konsultasi;
use App\Models\User;

use App\Models\Users;
use App\Models\Dokumen;

class LaporanController extends Controller
{

    public function laporan()
    {
        return view('admin.laporan');
    }

    public function laporan_konsultasi($tglawal, $tglakhir)
    {
        $k =  Konsultasi::whereDate('created_at', '>=', $tglawal)
        ->whereDate('created_at', '<=', $tglakhir)->orderBy('id', 'desc')->get();

        return view('admin.laporan.cetak_laporan_konsultasi', compact('k', 'tglawal', 'tglakhir'));
    }

    public function laporan_jadwal($tglawal, $tglakhir)
    {
        $j =  DetailJadwal::whereDate('created_at', '>=', $tglawal)
        ->whereDate('created_at', '<=', $tglakhir)->orderBy('id', 'desc')->get();

        return view('admin.laporan.cetak_laporan_jadwal', compact('j', 'tglawal', 'tglakhir'));
    }

    public function laporan_pendampingan($tglawal, $tglakhir)
    {
        $p =  Pendampingan::whereDate('created_at', '>=', $tglawal)
        ->whereDate('created_at', '<=', $tglakhir)->orderBy('id', 'desc')->get();

        return view('admin.laporan.cetak_laporan_pendampingan', compact('p', 'tglawal', 'tglakhir'));
    }
}
