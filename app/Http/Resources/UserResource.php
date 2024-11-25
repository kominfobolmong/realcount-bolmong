<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'tps' => $this->tps ? [
                'id' => $this->tps->id,
                'nama_tps' => $this->tps->nama_tps,
                'desa_id' => $this->tps->desa_id,
            ] : null,
        ];
    }
}
