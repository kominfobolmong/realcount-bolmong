<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DesaResource extends JsonResource
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
            'nama_desa' => $this->nama_desa,
            'kecamatan_id' => $this->kecamatan_id,
            'tps' => TpsResource::collection($this->whenLoaded('tps')),
        ];
    }
}
