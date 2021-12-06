<?php

namespace App\Models\Pacientes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pacientes';

    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'edad',
        'sexo',
        'edo_civil',
        'curp',
        'origen',
        'ocupacion',
        'domicilio',
        'num_ext',
        'num_int',
        'colonia',
        'tel1',
        'tel2'
    ];

}
