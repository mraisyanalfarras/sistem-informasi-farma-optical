<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PasienResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_pasien' => $this->nama_pasien,
            'ttl' => $this->ttl,
            'usia' => $this->usia,
            'sex' => $this->sex,
            'alamat' => $this->alamat,
            'no_hp' => $this->no_hp,
            'diagnosa' => $this->diagnosa,
            'od_sph' => $this->od_sph,
            'od_cyl' => $this->od_cyl,
            'od_axis' => $this->od_axis,
            'os_sph' => $this->os_sph,
            'os_cyl' => $this->os_cyl,
            'os_axis' => $this->os_axis,
            'pd' => $this->pd,
            'photo' => $this->photo,
            'tgl_pemeriksaan' => $this->tgl_pemeriksaan,
            'tgl_pengambilan' => $this->tgl_pengambilan,
        ];
    }
}
