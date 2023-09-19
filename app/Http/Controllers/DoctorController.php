<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;

class DoctorController extends Controller
{
    public function create()
    {
        $doctors = Doctor::all();
        $users = User::all();
        return view('admin.doctors.create', compact('doctors'), compact('users'));
    }

    public function store(Request $request)
    {
        $user = User::find($request->user_id);

        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',

            'nip' => 'required|numeric|max:18|min:9',
            'phone_number' => 'required|numeric|max:13',
            'address' => 'min:3|max:100',
            'gender' => 'required|in:L,P',

        ],
    [
        // 'nip.max' => 'Data harus 9 digit',
        'max' => 'Maksimal :max karakter',
        'email.unique' => 'Email sudah terdaftar',
        'min' => 'Minimal :min karakter',
        'numeric' => 'Data harus berupa angka',
        'required' => 'Data tidak boleh kosong',
    ]);

        $doctor = new Doctor;
        $doctor->nip = $request->nip;
        $doctor->user_id = $request->user_id;
        $doctor->doctor_name = $user->name;
        $doctor->gender = $request->gender;
        $doctor->phone_number = $request->phone_number;
        $doctor->address = $request->address;

        //simpan data ke database 
        $doctor->save();

        // echo 'Data berhasil disimpan';
        return redirect()
            ->to(route('doctors.index'))
            ->withSuccess('Berhasil menambah data Dokter');
    }

    public function index()
    {
        $doctors = Doctor::paginate(5);
        $script = [
            'admin/index'
        ];

        return view('admin.doctors.index', compact('doctors'), compact('script'));
    }

    public function show(Doctor $doctor)
    {
        $style = [
            'doctor',
            '../components/container.c'
        ];
        $script = [
            'admin/index'
        ];

        return view('admin.doctors.show', compact('doctor'), compact('style', 'script'));
    }

    public function edit(Doctor $doctor)
    {
        // $polys = Poly::all();
        $style = [
            'doctor',
            '../components/container.c'
        ];
        $script = [
            'admin/edit-doctor'
        ];

        return view('admin.doctors.edit', compact('doctor'), compact('style', 'script'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        // dd($request->all(), $doctor);
        $doctor->nip = $request->nip;
        $doctor->user_id = $request->user_id;
        $doctor->doctor_name = $request->doctor_name;
        $doctor->gender = $request->gender;
        $doctor->phone_number = $request->phone_number;
        $doctor->address = $request->address;

        $doctor->save();

        return redirect()
            ->to(route('doctors.show', $doctor->id))
            ->withSuccess('Berhasil mengubah data dokter');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        

        return redirect()
            ->to(route('doctors.index'));
    }

    public function history()
    {
        $data = [
            'judul'         => 'Laporan Pasien',

            'subJudul'      => 'Daftar Histori Antrian Obat Pasien'
        ];

        $style = [
            'historyPatients'
        ];

        $patients = Patient::all();

        return view('admin.laporan.index', compact('data', 'style', 'patients'));
    }
}
