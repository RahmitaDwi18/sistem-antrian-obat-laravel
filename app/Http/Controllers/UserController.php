<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Docter;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

  public function create()
  {
    $user = User::all();
    return view('admin.users.create', compact('user'));
  }

  public function store(Request $request)
  {

    $request->validate(
      [
        'name' => 'required|max:100',
        'email' => 'required|unique:users,email',
        'password' => 'required|min:8',

        'nip' => 'required|numeric|min:9|unique:doctors',
        'phone_number' => 'required|numeric|min:11',
        'address' => 'min:3|max:100',
        'gender' => 'required|in:L,P',

      ],
      [
        // 'nip.max' => 'Data harus 9 digit',
        'max' => 'Maksimal :max karakter',
        'email.unique' => 'Email sudah terdaftar',
        'min' => 'Minimal :min karakter',
        'numeric' => 'Data harus berupa angka',
      ]
    );

    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role = 'dokter';
    $user->save();

    $doctor = new Doctor;
    $doctor->nip = $request->nip;
    $doctor->user_id = $user->id;
    $doctor->doctor_name = $user->name;
    $doctor->gender = $request->gender;
    $doctor->phone_number = $request->phone_number;
    $doctor->address = $request->address;

    //simpan data ke database 
    $doctor->save();

    return redirect()
      ->to(route('doctors.index'))
      ->withSuccess('Berhasil menambah data Dokter');
  }

  public function show(User $user)
  {
    return view('admin.users.show', compact('user'));
  }

  // public function password(){

  //     return view('profil.ProfilStudent.password');
  //   }

  public function editPassword()
  {
    return view('profil.ubahPassword');
  }

  public function updatePassword(Request $request)
  {
    $user = User::find(auth()->id());

    if (!empty($request->password)) {
      $user->update([
        'password' => bcrypt($request->password),
      ]);
    }

    return redirect()
      ->to(route('profil.data'))
      ->withSuccess('success', 'Password berhasil diubah');
  }
}
