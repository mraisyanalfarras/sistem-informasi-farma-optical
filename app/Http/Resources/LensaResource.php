<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LensaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'nama_lensa'    => $this->nama_lensa,
            'deskripsi'     => $this->deskripsi,
            'material'      => $this->material,
            'harga_lensa'   => $this->harga_lensa,
            'jenis'         => $this->jenis,
            'stok'          => $this->stok,
            'created_at'    => $this->created_at->toDateTimeString(),
            'updated_at'    => $this->updated_at->toDateTimeString(),
        ];
    }
}
