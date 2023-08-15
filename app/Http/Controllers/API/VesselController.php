<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Resources\VesselResource;
use App\Models\Vessel;

class VesselController extends BaseController
{
    public function vessels($type) 
    {
        $vessels= Vessel::where('vessel_type', $type)->get();
        return $this->sendResponse(VesselResource::collection($vessels), 'Data retrieved successfully.');
    }
}
