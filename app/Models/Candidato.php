<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable = [
        'correo', 'nombre', 'tipo_documento','numero_documento'
    ];
    public $timestamps = false;
}
