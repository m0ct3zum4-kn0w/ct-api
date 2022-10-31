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

    public function cuarentena(){
        return $this->hasMany(\App\Models\Cuarentena::class,'criaID','id');
    }

    public function sensores(){
        return $this->hasMany(\App\Models\Sensores::class,'criaID','id');
    }

    public function sensor(){
        return $this->hasOne(\App\Models\Sensores::class,'criaID','id')->latest();
    }
}
