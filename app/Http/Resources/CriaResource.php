<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class CriaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'ID' => $this->id,
            'Nombre' => $this->nombre,
            'peso' => $this->peso,
            'marmoleo' => $this->marmoleo,
            'musculo' => $this->musculo,
            'Carne' => $this->carne,
            'sensor' => [
                'Cardiaca' => $this->sensores->cardiaca ?? null,
                'Temperatura' => $this->sensores->temperatura ?? null,
                'Sanguinea' => $this->sensores->sanguinea ?? null,
                'Respiratoria' => $this->sensores->respiratoria ?? null
            ],
            'Estado' => ucfirst($this->estatus) ?? "Saludable"
        ];
    }
}
