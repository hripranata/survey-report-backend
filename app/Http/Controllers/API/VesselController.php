<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Resources\VesselResource;
use App\Models\Vessel;
use Illuminate\Support\Facades\Validator;

class VesselController extends BaseController
{
    public function index() 
    {
        $vessels = Vessel::orderBy('updated_at', 'desc')->get();
        return $this->sendResponse(VesselResource::collection($vessels), 'Data retrieved successfully.');
    }

    public function show($id)
    {
        $vessel = Vessel::find($id);
        return $this->sendResponse(new VesselResource($vessel), 'Data retrieved successfully.');
    }
    public function filter($type)
    {
        $vessels = Vessel::where('vessel_type', $type)->get();
        return $this->sendResponse(VesselResource::collection($vessels), 'Data retrieved successfully.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vessel_name' => 'required',
            'vessel_type' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $vessel = Vessel::create([
            'vessel_name' => $request->vessel_name,
            'vessel_type' => $request->vessel_type,
        ]);

        return $this->sendResponse($vessel, 'Data insert successfully.');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'vessel_name' => 'required',
            'vessel_type' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $updated_data = Vessel::where('id', $id)->update([
            'vessel_name' => $request->vessel_name,
            'vessel_type' => $request->vessel_type,
        ]);

        return $this->sendResponse($updated_data, 'Data updated successfully.');

    }

    public function destroy($id)
    {
        Vessel::where('id', $id)->delete();
        return $this->sendResponse([], 'Data deleted successfully.');
    }
}
