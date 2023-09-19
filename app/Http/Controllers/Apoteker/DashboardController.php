<?php

namespace App\Http\Controllers\Apoteker;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $hariIni = Patient::wherein('status', ['belum', 'selesai', 'batal','lewat'])
        ->whereNotNull('recipe')
        ->whereDate('created_at', Carbon::today())
        ->count();

        $tidakTerpanggil = Patient::where('status', 'batal')->whereDate('created_at', Carbon::today())->count();
        $terpanggil = Patient::where('status', 'selesai')->whereDate('created_at', Carbon::today())->count();


        return view('apoteker.dashboard', compact('hariIni', 'tidakTerpanggil', 'terpanggil'));
    }
}
