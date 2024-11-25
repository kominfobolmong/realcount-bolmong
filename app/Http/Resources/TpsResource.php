<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TpsResource extends JsonResource
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
            'nama_tps' => $this->nama_tps,
            'total_dpt' => $this->total_dpt,
            'suara_tidak_sah' => $this->suara_tidak_sah,
            'desa_id' => $this->desa_id,
            'desa' => $this->desa->nama_desa,
        ];
    }
}
