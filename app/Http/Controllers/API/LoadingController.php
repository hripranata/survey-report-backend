<?php

namespace App\Http\Controllers\API;

use App\Models\Loading;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\LoadingResource;
use App\Models\LoDetail;
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
    public function filter($month, $year)
    {
        $loading = Loading::whereYear('lo_date', $year)->whereMonth('lo_date', $month)->get();
  
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

    public function loading_counter($month)
    {
        // $loadings = DB::table('loadings')
        //             ->join('lo_details', 'lo_details.loading_id', '=', 'loadings.id')
        //             ->join('bunkers', 'bunkers.id', '=', 'lo_details.bunker_id')
        //             ->selectRaw('count(loadings.id) as total_loading, sum(loadings.vol_lo) as total_lo, count(bunkers.id) as total_bunker, sum(bunkers.vol_ar) as total_ar')
        //             ->whereMonth('loadings.lo_date', $month)
        //             ->where('loadings.deleted_at', null)
        //             ->where('bunkers.deleted_at', null)
        //             ->first();
        $loadings = DB::table('loadings')
                    ->selectRaw('count(id) as total_loading, sum(vol_lo) as total_lo')
                    ->whereMonth('loadings.lo_date', $month)
                    ->where('deleted_at', null)
                    ->first();
  
        if (is_null($loadings)) {
            return $this->sendError('Data not found.');
        }

        return $this->sendResponse($loadings, 'Data retrieved successfully.');
    }

}
