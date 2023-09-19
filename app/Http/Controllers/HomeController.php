<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Poly;
use App\Models\Doctor;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PasienExport;

// use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function admin()
    {
        $style = [
            'admin'
        ];

        $poly = Poly::count();
        $patient = Patient::count();
        $doctor = Doctor::count();

        return view('admin', compact('style', 'poly', 'patient', 'doctor'));
    }

    public function laporan()
    {
        $data = [
            'judul'         => 'Laporan Obat Keluar',

            'subJudul'      => 'Daftar Laporan Antrian Obat Pasien'
        ];

        $style = [
            'historyPatients'
        ];

        $patients = Patient::all();

        // return view('admin.laporan.index', compact('data', 'style', 'patients'));
        return view('dokter.patients.index', compact('data', 'style', 'patients'));
    }


    public function export(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        return Excel::download(new PasienExport($startDate, $endDate), 'LaporanPasien.xlsx');
    }


    public function index(Request $request)
    {
        // dd($request);
        $date = $request->date;

        $script = [
            'patients/index'
        ];

        if (auth()->user()->role == 'admin') {
            $date = $request->date;

            $patients = Patient::when($request->masuk, function ($query) use ($request) {
                return $query->whereDate('created_at', $request->masuk);
            })
                ->when($request->q, function ($query) use ($request) {
                    $q = $request->q;

                    return $query->where('name', 'like', '%' . $q . '%')
                        ->orWhere('recipe', 'like', '%' . $q . '%')
                        ->orWhere('id_poly', 'like', '%' . $q . '%')
                        ->orWhere('symptom', 'like', '%' . $q . '%');
                });
        } elseif (auth()->user()->role == 'dokter') {
            $user = auth()->user();

            $id_doctor = $user->doctor->id;

            $poly = Poly::where('id_doctor', $id_doctor)->first();
            // $patients = Patient::where(['id_poly' => $poly->id_poly]);

            $date = $request->date;

            $patients = Patient::where('id_poly', $poly->id_poly)
                ->when($request->masuk, function ($query) use ($request) {
                    return $query->whereDate('created_at', $request->masuk);
                })
                ->when($request->q, function ($query) use ($request) {
                    $q = $request->q;

                    return $query->where(function ($query) use ($q) {
                        $query->where('name', 'like', '%' . $q . '%')
                            ->orWhere('recipe', 'like', '%' . $q . '%')
                            ->orWhere('id_poly', 'like', '%' . $q . '%')
                            ->orWhere('symptom', 'like', '%' . $q . '%');
                    });
                });
        } elseif (auth()->user()->role == 'apoteker') {
            $patients = Patient::when($request->masuk, function ($query) use ($request) {
                return $query->whereDate('created_at', $request->masuk);
            })
                ->when($request->q, function ($query) use ($request) {
                    $q = $request->q;

                    return $query->where('name', 'like', '%' . $q . '%')
                        ->orWhere('recipe', 'like', '%' . $q . '%');
                })
                ->wherein('status', ['belum', 'lewat']);
        }
        // dd($patients);
        $patients = $patients->paginate(10);

        $polys = Poly::all();
        $hideKelola = true;


        return view('admin.laporan.index', compact('patients', 'polys', 'script', 'hideKelola'));
    }
}
