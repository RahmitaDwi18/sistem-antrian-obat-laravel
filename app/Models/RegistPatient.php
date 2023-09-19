<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistPatient extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_patient';

    public function poly()
    {
        return $this->hasOne(Poly::class, 'id_poly', 'id_poly');
    }
}
