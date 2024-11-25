<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HasilBupatiResource extends JsonResource
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
            'desa' => "Kecamatan " . $this->tps->desa->kecamatan->nama_kecamatan . ", Desa " . $this->tps->desa->nama_desa ?? null,
            'tps_id' => $this->tps_id,
            'nama_tps' => $this->tps->nama_tps ?? null,
            'paslon_id' => $this->paslon_id,
            'paslon' => [
                'nomor_urut' => $this->paslon->nomor_urut ?? null,
                'nama_paslon' => $this->paslon->nama_paslon ?? null,
                'nama_calon' => $this->paslon->nama_calon ?? null,
                'nama_wakil_calon' => $this->paslon->nama_wakil_calon ?? null,
            ],
            'suara_sah' => $this->suara_sah,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
