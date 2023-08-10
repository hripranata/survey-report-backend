<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BunkerResource extends JsonResource
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
            'tongkang' => $this->tongkang,
            'kri' => $this->kri,
            'bunker_location' => $this->bunker_location,
            'bbm' => $this->bbm,
            'start' => $this->start,
            'stop' => $this->stop,
            'vol_lo' => $this->vol_lo,
            'vol_ar' => $this->vol_ar,
            'surveyor' => $this-> surveyor,
            'lo_number' => LoDetailResource::collection($this->lo_details),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
