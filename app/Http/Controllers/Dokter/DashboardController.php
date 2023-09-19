<?php

namespace App\Http\Controllers\Dokter;

use App\Models\Poly;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // $user = auth()->user();
        // $id_doctor = $user->doctor->id;

        // $poly = Poly::where('id_doctor', $id_doctor)->first();
        // $patients = Patient::where('id_poly', $poly->id_poly)
        //     ->whereNull('recipe');

        $user = auth()->user();
        $id_doctor = $user->doctor->id;

        $poly = Poly::where('id_doctor', $id_doctor)->first();
        $patients = Patient::where('id_poly', $poly->id_poly);



        $pendaftar = $patients->whereDate('created_at', Carbon::today())->count(); 
        
        return view('Dokter.dashboard', compact('pendaftar'));
    }
}
