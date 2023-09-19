<?php

namespace App\Http\Controllers\CustomerService;

use Carbon\Carbon;
use App\Models\Patient;
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

        $patients = Patient::whereDate('created_at', Carbon::today())->count(); 
        // dd($patients);

        return view('customer-service.dashboard', compact ('patients'));
    }
}
