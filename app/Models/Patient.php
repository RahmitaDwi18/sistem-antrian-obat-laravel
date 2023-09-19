<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'patients';

    protected $fillable = ['status'];
    
    public function poly()
    {
        return $this->hasOne(Poly::class, 'id_poly', 'id_poly');
    }

    public function regist_patient()
    {
        return $this->hasOne(RegistPatient::class, 'id_patient', 'id_patient');
    }
}
