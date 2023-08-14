<?php

namespace App\Http\Controllers\API;

use App\Models\Loading;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\LoadingResource;
use App\Http\Resources\VesselResource;
use App\Models\LoDetail;
use App\Models\Vessel;
use Illuminate\Support\Facades\DB;

class LoadingController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loadings = Loading::all();
        return $this->sendResponse(LoadingResource::collection($loadings), 'Data retrieved successfully.');
        // $vessels= Vessel::first();
        // return $this->sendResponse(new VesselResource($vessels), 'Data retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lo_date' => 'required',
            'tongkang_id' => 'required',
            'bbm' => 'required',
            'start' => 'required',
            'stop' => 'required',
            'vol_lo' => 'required',
            'vol_al' => 'required',
            'lo_details' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        DB::beginTransaction();
        try{
            $loading = Loading::create([
                'user_id' => Auth::user()->id,
                'lo_date' => $request->lo_date,
                'tongkang_id' => $request->tongkang_id,
                'bbm' => $request->bbm,
                'start' => $request->start,
                'stop' => $request->stop,
                'vol_lo' => $request->vol_lo,
                'vol_al' => $request->vol_al,
                'surveyor' =>  Auth::user()->name,
            ]);
    
            $los = $request->lo_details;
            foreach( $los as $lo){
                LoDetail::create(
                    [
                        'loading_id' => $loading->id,
                        'lo_number' => $lo['lo_number'],
                        'product' => $request->bbm,
                        'qty' => $lo['qty'],
                    ]
                );
            };

            DB::commit();
            return $this->sendResponse(new LoadingResource($loading), 'Data insert successfully.');
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
        $loading = Loading::find($id);
  
        if (is_null($loading)) {
            return $this->sendError('Data not found.');
        }
   
        return $this->sendResponse(new LoadingResource($loading), 'Data retrieved successfully.');
    }

    /**
     * Display the specified resource by filter.
     */
    public function filter($month)
    {
        $loading = Loading::whereMonth('lo_date', $month)->get();
  
        if (is_null($loading)) {
            return $this->sendError('Data not found.');
        }
   
        return $this->sendResponse(LoadingResource::collection($loading), 'Data retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'lo_date' => 'required',
            'tongkang_id' => 'required',
            'bbm' => 'required',
            'start' => 'required',
            'stop' => 'required',
            'vol_lo' => 'required',
            'vol_al' => 'required',
            'lo_details' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        DB::beginTransaction();
        try{
            Loading::where('id', $id)->update(
                [
                    'lo_date' => $request->lo_date,
                    'tongkang_id' => $request->tongkang_id,
                    'bbm' => $request->bbm,
                    'start' => $request->start,
                    'stop' => $request->stop,
                    'vol_lo' => $request->vol_lo,
                    'vol_al' => $request->vol_al,
                ]
            );
    
            $los = $request->lo_details;
            foreach( $los as $lo){
                LoDetail::where('loading_id', $id)->where('id', $lo['id'])->update(
                    [
                        'lo_number' => $lo['lo_number'],
                        'product' => $request->bbm,
                        'qty' => $lo['qty'],
                    ]
                );
            };

            DB::commit();
    
            $updated_data = Loading::find($id);
    
            return $this->sendResponse(new LoadingResource($updated_data), 'Data updated successfully.');

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
        Loading::where('id', $id)->delete();
        LoDetail::where('loading_id', $id)->delete();

        return $this->sendResponse([], 'Data deleted successfully.');
    }
}
