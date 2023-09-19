<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poly extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_poly';

    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'id', 'id_doctor');
    }
}
