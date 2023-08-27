<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\BunkerResource;
use App\Http\Resources\LoDetailResource;
use App\Models\Bunker;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\LoDetail;
use Illuminate\Support\Facades\DB;

class BunkerController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bunkers = Bunker::all();
        return $this->sendResponse(BunkerResource::collection($bunkers), 'Data retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tongkang_id' => 'required',
            'kri_id' => 'required',
            'bunker_location' => 'required',
            'bbm' => 'required',
            'start' => 'required',
            'stop' => 'required',
            'vol_lo' => 'required',
            'vol_ar' => 'required',
            'lo_details' => 'nullable',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        DB::beginTransaction();
        try {
            $bunker = Bunker::create([
                'user_id' => Auth::user()->id,
                'tongkang_id' => $request->tongkang_id,
                'kri_id' => $request->kri_id,
                'bunker_location' => $request->bunker_location,
                'bbm' => $request->bbm,
                'start' => $request->start,
                'stop' => $request->stop,
                'vol_lo' => $request->vol_lo,
                'vol_ar' => $request->vol_ar,
                'surveyor' =>  Auth::user()->name,
            ]);
    
            if (count($request->lo_details) > 0) {
                $los = $request->lo_details;
                foreach( $los as $lo){
                    LoDetail::where('id', $lo['id'])->update(
                        [
                            'bunker_id' => $bunker->id,
                        ]
                    );
                };
            }

            DB::commit();
    
            return $this->sendResponse(new BunkerResource($bunker), 'Data insert successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError('DB Transaction Error.', $e); 
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bunker = Bunker::with('lo_details')->find($id);
  
        if (is_null($bunker)) {
            return $this->sendError('Data not found.');
        }
   
        return $this->sendResponse(new BunkerResource($bunker), 'Data retrieved successfully.');
    }
    
    /**
     * Display the specified resource by filter.
     */
    public function filter($month, $year)
    {
        $bunker = Bunker::whereYear('stop', $year)->whereMonth('stop', $month)->get();
  
        if (is_null($bunker)) {
            return $this->sendError('Data not found.');
        }
   
        return $this->sendResponse(BunkerResource::collection($bunker), 'Data retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tongkang_id' => 'required',
            'kri_id' => 'required',
            'bunker_location' => 'required',
            'bbm' => 'required',
            'start' => 'required',
            'stop' => 'required',
            'vol_lo' => 'required',
            'vol_ar' => 'required',
            'lo_details' => 'nullable',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        DB::beginTransaction();
        try {
            Bunker::where('id', $id)->update([
                'tongkang_id' => $request->tongkang_id,
                'kri_id' => $request->kri_id,
                'bunker_location' => $request->bunker_location,
                'bbm' => $request->bbm,
                'start' => $request->start,
                'stop' => $request->stop,
                'vol_lo' => $request->vol_lo,
                'vol_ar' => $request->vol_ar,
            ]);
    
            if (count($request->lo_details) > 0) {
                LoDetail::where('bunker_id', $id)->update(
                    [
                        'bunker_id' => null,
                    ]
                );
    
                $los = $request->lo_details;
                foreach( $los as $lo){
                    LoDetail::where('id', $lo['id'])->update(
                        [
                            'bunker_id' => $id,
                        ]
                    );
                };
            }

            DB::commit();
    
            $updated_data = Bunker::with('lo_details')->find($id);
    
            return $this->sendResponse(new BunkerResource($updated_data), 'Data updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError('DB Transaction Error.', $e); 
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        LoDetail::where('bunker_id', $id)->update(
            [
                'bunker_id' => null,
            ]
        );

        Bunker::where('id', $id)->delete();

        return $this->sendResponse([], 'Data deleted successfully.');
    }

    public function listlodetail($tongkang_id) {
        $loDetails = DB::table('lo_details')
                        ->join('loadings', 'lo_details.loading_id', '=', 'loadings.id')
                        ->join('vessels', 'vessels.id', '=', 'loadings.tongkang_id')
                        ->select('lo_details.id', 'lo_details.bunker_id', 'lo_details.lo_number', 'lo_details.product', 'lo_details.qty')
                        ->where('lo_details.bunker_id', '=', null)
                        ->where('vessels.id', '=', $tongkang_id)
                        ->where('lo_details.deleted_at', '=', null)
                        ->get();

        return $this->sendResponse(LoDetailResource::collection($loDetails), 'Data retrieved successfully.');
    }

    public function bunker_counter($month)
    {
        $bunkers = DB::table('bunkers')
                    ->selectRaw('count(id) as total_bunker, sum(vol_ar) as total_ar')
                    ->whereMonth('start', $month)
                    ->where('deleted_at', null)
                    ->first();
  
        if (is_null($bunkers)) {
            return $this->sendError('Data not found.');
        }

        return $this->sendResponse($bunkers, 'Data retrieved successfully.');
    }
}
