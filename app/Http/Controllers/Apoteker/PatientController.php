<?php

namespace App\Http\Controllers\Apoteker;

use App\Models\Patient;
use App\Models\Poly;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Carbon\Carbon;

class PatientController extends Controller
{

    public function index(Request $request)
    {
        // dd($request);
        $date = $request->date;

        $script = [
            'patients/index'
        ];

        $jumlah = Patient::wheredate('created_at', now())->count();
        // dd($jumlah);
        if ($jumlah > 0) {
            $max_que = Patient::wheredate('created_at', now())->latest()->first();
            // dd($max_que);
            $no_urut = $max_que->no_queue + 1;
            $no_obat = $max_que->no_antrian_obat;
        } else if ($jumlah == 0) {
            $no_urut = 1;
            $no_obat = 1;
        }


        $patients = Patient::when($request->masuk, function ($query) use ($request) {
            return $query->whereDate('created_at', $request->masuk)->orderBy('updated_at', 'ASC');
        })

            ->when($request->masuk == null, function ($query) use ($request) {
                return $query->whereDate('created_at', Carbon::today())->orderBy('updated_at', 'ASC');
            })
            ->when($request->q, function ($query) use ($request) {
                $q = $request->q;

                return $query->where('name', 'like', '%' . $q . '%')
                    ->orWhere('recipe', 'like', '%' . $q . '%')->orderBy('updated_at', 'ASC');
            })
            ->whereNotNull('recipe')
            ->wherein('status', ['belum', 'lewat'])->orderBy('updated_at', 'ASC');

        // dd($patients);
        $patients = $patients->paginate(5);

        $polys = Poly::all();
        $hideKelola = true;


        return view('apoteker.patients.index', compact('patients', 'polys', 'script', 'hideKelola'));
    }

    public function history()
    {
        $data = [
            'judul' => 'History Obat Keluar'
        ];

        $style = [
            '../includes/historyPatients'
        ];

        return view('admin.laporan.index', compact('data', 'style'));
    }

    public function kelola(Patient $patient)
    {

        // $patient = Patient::all();
        $patient = Patient::where('id', $patient->id)->get();
        // dd($patient);
        $style = [
            '../components/container.c',
            'kelola'
        ];

        return view('apoteker.patients.kelola', compact('style', 'patient'));
    }

    public function show(Patient $patient)
    {
        // $patient = Patient::find($patient);
        // $patient = Patient::where('id', $patient->id)->get();
        $polys = Poly::all();
        $style = [
            'patients',
            '../components/container.c'
        ];
        $script = [
            'admin/index'
        ];
        // dd($patient);
        return view('apoteker.patients.show', compact('patient'), compact('style', 'script', 'polys'));
    }


    public function gantiStatus(Patient $patient, Request $request)
    {


        // $patient = Patient::all();
        Patient::where('id', $patient->id)->update(['status' => $request->status]);
        // dd($patient);
        $style = [
            '../components/container.c',
            'kelola'
        ];
        // dd($patient->id);
        return redirect()->to(route('apoteker.patients.index'));
        // return view('dokter.patients.kelola', compact('style', 'patient'));
    }
}
