<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Poly;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;

class PatientController extends Controller
{

    public function create()
    {
        $doctors = Doctor::all();
        // $patients = Patient::all();
        $polys = Poly::all();
        $polydoctor = User::where('users.id', auth()->user()->id)
            ->join('doctors', 'doctors.user_id', '=', 'users.id')
            ->join('polies', 'polies.id_doctor', '=', 'doctors.id')->get()->first();
        // dd($polydoctor);
        return view('dokter.patients.create', compact('polys', 'doctors', 'polydoctor'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:120',
            'age' => 'required|numeric',
            'recipe' => 'required|min:3|max:120',
            'symptom' => 'nullable'
        ]);

        $id_poly = auth()->user()->doctor->poly->id_poly;

        $jumlah = Patient::wheredate('created_at', now())->count();
        // dd($jumlah);
        if ($jumlah > 0) {
            $max_que = Patient::wheredate('created_at', now())->latest()->first();
            // dd($max_que);
            $no_urut = $max_que->no_queue + 1;
        } else if ($jumlah == 0) {
            $no_urut = 1;
        }
        // $poly = Poly::where('id_doctor', auth()->user()->id)->first();
        // $id_poly = $poly->id_poly;

        $patient = new Patient;
        $patient->id_poly = $id_poly;
        $patient->no_queue = $no_urut;
        $patient->name = $request->name;
        $patient->age = $request->age;
        $patient->gender = $request->gender;
        // $patient->id = $request->id_poly;
        $patient->symptom = $request->symptom;
        $patient->recipe = $request->recipe;
        $patient->status = "belum";

        //simpan data ke database 
        $patient->save();

        // echo 'Data berhasil disimpan';
        return redirect()
            ->to(route('patients.index'))
            ->withSuccess('Berhasil menambah data Pasien');
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


        return view('apoteker.patients.index', compact('patients', 'polys', 'script', 'hideKelola'));
    }

    public function show(Patient $patient)
    {

        // $patient = Patient::find($patient);
        $polys = Poly::all();
        $style = [
            'patients',
            '../components/container.c'
        ];
        $script = [
            'admin/index'
        ];
        // dd($patient);
        return view('dokter.patients.show', compact('patient'), compact('style', 'script'));
    }

    public function edit(Patient $patient)
    {
        $polys = Poly::all();
        $style = [
            '../components/container.c'
        ];
        $script = [
            'patients/edit-patients'
        ];

        return view('dokter.patients.edit', compact('patient', 'polys'), compact('style', 'script'));
    }

    public function update(Request $request, Patient $patient)
    {
        $patient->name = $request->name;
        $patient->age = $request->age;
        $patient->gender = $request->gender;
        $patient->id_poly = $request->id_poly;
        $patient->symptom = $request->symptom;
        $patient->recipe = $request->recipe;
        $patient->save();

        return redirect()
            ->to(route('patients.show', $patient->id))
            ->withSuccess('Berhasil mengedit data pasien');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()
            ->to(route('patients.index'));
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

        return view('dokter.patients.kelola', compact('style', 'patient'));
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
