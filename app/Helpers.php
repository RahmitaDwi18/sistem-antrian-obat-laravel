<?php

use App\Models\Poly;

function isDoctorInPoly($doctorId)
{
    $cek = Poly::where('id_doctor', $doctorId)->first();

    return $cek;
}