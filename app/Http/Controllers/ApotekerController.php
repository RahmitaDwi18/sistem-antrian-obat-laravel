<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ApotekerController extends Controller
{
    public function history(Request $request)
    {
        $patients = Patient::wherein('status', ['selesai','batal'])
            // ->orWhere('status', 'selesai')
            ->with('poly')
            ->when($request->masuk == null, function ($query) use ($request) {
                return $query->whereDate('created_at', Carbon::today());
            })
            
            // $date = $request->date;

            // $patients = Patient::when($request->masuk, function ($query) use ($request) {
            //     return $query->whereDate('created_at', $request->masuk);
            // })

            //     ->when($request->masuk == null, function ($query) use ($request) {
            //         return $query->whereDate('created_at', Carbon::today());
            //     })
            //     ->when($request->q, function ($query) use ($request) {
            //         $q = $request->q;

            //         return $query->where(function ($query) use ($q) {
            //             $query->where('name', 'like', '%' . $q . '%')
            //                 ->orWhere('recipe', 'like', '%' . $q . '%')
            //                 ->orWhere('id_poly', 'like', '%' . $q . '%')
            //                 ->orWhere('symptom', 'like', '%' . $q . '%');
            //         });
            //     })


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
            })

            ->paginate(5);

        $data = [
            'judul'         => 'Histori Obat Keluar',

            'subJudul'      => 'Daftar Histori Antrian Obat Pasien',

        ];

        $style = [
            'historyPatients'
        ];
        // $patients = $patients->paginate(5);

        return view('apoteker.patients.data', compact('data', 'style', 'patients'));
    }

    public function search(Request $request)
    {
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

        return view('apoteker.patients.data', compact('patients', 'date'));
    }
}
