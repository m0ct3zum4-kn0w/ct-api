<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crias extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombre",
        "costo",
        "peso",
        "marmoleo",
        "musculo",
        "cardiaca",
        "respiratoria",
        "sanguinea",
        "temperatura",
        "description",
        "proveedor"
    ];
}
