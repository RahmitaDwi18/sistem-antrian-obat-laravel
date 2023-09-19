<?php

namespace App\Http\Controllers;

use App\Models\Poly;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;

class PolyController extends Controller
{

    public function create()
    {
        $doctors = Doctor::all();
        $style = [
            '../components/container.c'
        ];
        return view('admin.polies.create', compact('doctors'), compact('style'));
    }

    public function store(Request $request)
    {

        $request->validate([
            // 'id' => 'required|numeric',
            'poly_name' => 'required|min:3|max:120|unique:polies',
        ]);

        $poly = new Poly();
        $poly->id_doctor = $request->id_doctor;
        $poly->poly_name = $request->poly_name;
        $poly->doctor_name = $request->id_doctor;
        //simpan data ke database 
        $poly->save();

        // echo 'Data berhasil disimpan';
        return redirect()
            ->to(route('polys.index', $poly->id_poly))
            ->withSuccess('Berhasil menambah data Ruang Poli');
    }

    public function index()
    {
        // $polys = Poly::withTrashed()->paginate();
        $polys = Poly::paginate(5);

        $style = [
            'polies'
        ];
        $script = [
            'admin/index'
        ];

        return view('admin.polies.index', compact('polys'), compact('style', 'script'));
    }

    public function show(Poly $poly)
    {
        $style = [
            'polies',
            '../components/container.c'
        ];
        $script = [
            'admin/index'
        ];

        return view('admin.polies.show', compact('poly'), compact('style', 'script'));
    }

    public function edit(Poly $poly)
    {
        $doctors = Doctor::all();
        $style = [
            '../components/container.c'
        ];
        $script = [
            'admin/edit-poly'
        ];

        return view('admin.polies.edit', compact('poly', 'doctors'), compact('style', 'script'));
    }

    public function update(Request $request, Poly $poly)
    {

        $poly->id_doctor = $request->id_doctor;
        $poly->poly_name = $request->poly_name;
        $poly->doctor_name = $request->id_doctor;
        $poly->save();

        return redirect()
            ->to(route('polys.show', $poly->id_poly))
            ->withSuccess('Berhasil Mengedit Data Ruang Poli');
    }

    public function destroy(Poly $poly)
    {
        $poly->delete();

        return redirect()
            ->to(route('polys.index'));
    }
}
