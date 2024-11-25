<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaslonResource extends JsonResource
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
            'id' => $this->id,
            'paslon' => $this->nama_paslon,
            'nama_calon' => $this->nama_calon,
            'wakil' => $this->nama_wakil_calon,
            'nomor_urut' => $this->nomor_urut,
            'foto_url' => $this->foto_url,
            'tipe_pemilihan' => [
                'id' => $this->tipePemilihan->id,
                'nama_tipe' => $this->tipePemilihan->nama_tipe_pemilihan,
            ],
        ];
    }
}
