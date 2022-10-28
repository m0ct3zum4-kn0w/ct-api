<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'criaID' => $this->id,
            'nombre' => $this->nombre,
            'peso' => $this->peso,
            'marmoleo' => $this->marmoleo,
            'musculo' => $this->musculo,
            'temperatura' => $this->temperatura,
            'respiratoria' => $this->respiratoria,
            'cardiaca' => $this->cardiaca,
            'sanguinea' => $this->sanguinea
        ];
    }
}
