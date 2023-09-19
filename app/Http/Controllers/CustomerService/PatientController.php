<?php

namespace App\Http\Controllers\CustomerService;

use App\Models\Patient;
use App\Models\Poly;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Carbon\Carbon;

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
        return view('customer-service.patients.create', compact('polys', 'doctors', 'polydoctor'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'no_bpjs' => 'required|max:11|min:11',
                'name' => 'required|min:3|max:120',
                'age' => 'required|numeric|min:0',
                'gender' => 'required|in:L,P',
                'id_poly' => 'required|numeric|exists:polies,id_poly',
                'symptom' => 'nullable'
            ],
            [
                'max' => 'Maksimal :max karakter',
                'min' => 'Minimal :min karakter',
                'numeric' => 'Data harus berupa angka',
                'required' => 'Data tidak boleh kosong',
                'age.min' => 'Data umur tidak boleh negatif'

            ]
        );

        $id_poly = $request->id_poly;

        $jumlah = Patient::wheredate('created_at', now())->count();
        // dd($jumlah);
        if ($jumlah > 0) {
            $max_que = Patient::wheredate('created_at', now())->latest()->first();
            // dd($max_que);
            $no_urut = $max_que->no_queue + 1;
        } else if ($jumlah == 0) {
            $no_urut = 1;
        }

        $patient = new Patient;
        $patient->id_poly = $id_poly;
        $patient->no_queue = $no_urut;
        $patient->no_bpjs = $request->no_bpjs;
        $patient->name = $request->name;
        $patient->age = $request->age;
        $patient->gender = $request->gender;
        $patient->code_map = $request->code_map;
        $patient->address = $request->address;
        $patient->symptom = $request->symptom;
        // $patient->recipe = $request->recipe;
        // $patient->status = "belum";

        //simpan data ke database 
        $patient->save();

        // echo 'Data berhasil disimpan';
        return redirect()
            ->to(route('cs.patients.index'))
            ->withSuccess('Berhasil menambah data Pasien');
    }

    public function index(Request $request)
    {
        $date = $request->date;

        $script = [
            'cs/patients/index'
        ];

        $user = auth()->user();


        $patients = Patient::query();

        $date = $request->date;

        $patients = Patient::when($request->masuk, function ($query) use ($request) {
            return $query->whereDate('created_at', $request->masuk);
        })

            ->when($request->masuk == null, function ($query) use ($request) {
                return $query->whereDate('created_at', Carbon::today());
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
        // dd($patients);
        $patients = $patients->latest()->paginate(5);

        $polys = Poly::all();
        $hideKelola = true;


        return view('customer-service.patients.index', compact('patients', 'polys', 'script', 'hideKelola'));
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
            'cs/index'
        ];
        // dd($patient);
        return view('customer-service.patients.show', compact('patient'), compact('style', 'script'));
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

        return view('customer-service.patients.edit', compact('patient', 'polys'), compact('style', 'script'));
    }

    public function update(Request $request, Patient $patient)
    {
        $patient->no_bpjs = $request->no_bpjs;
        $patient->name = $request->name;
        $patient->age = $request->age;
        $patient->gender = $request->gender;
        $patient->id_poly = $request->id_poly;
        $patient->code_map = $request->code_map;
        $patient->address = $request->address;
        $patient->symptom = $request->symptom;
        // $patient->recipe = $request->recipe;
        $patient->save();

        return redirect()
            ->to(route('cs.patients.show', $patient->id))
            ->withSuccess('Berhasil mengedit data pasien');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()
            ->to(route('cs.patients.index'));
    }
}
