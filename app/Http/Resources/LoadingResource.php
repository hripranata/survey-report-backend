<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoadingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'lo_date' => $this->lo_date,
            'tongkang' => new VesselResource($this->tongkang),
            'bbm' => $this->bbm,
            'start' => $this->start,
            'stop' => $this->stop,
            'vol_lo' => $this->vol_lo,
            'vol_al' => $this->vol_al,
            'surveyor' => $this-> surveyor,
            'lo_details' => LoDetailResource::collection($this->lo_details),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}