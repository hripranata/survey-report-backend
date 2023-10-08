<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return $this->sendResponse(UserResource::collection($users), 'Data retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return $this->sendResponse(new UserResource($user), 'Data retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nik' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        $updated_data = User::where('id', $id)->update([
            'name' => $request->name,
            'nik' => $request->nik,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
   
        return $this->sendResponse($updated_data, 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required',
            'password' => 'required',
            'npassword' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $user = User::where('nik', $request->nik)->first();
        
        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->sendError('These credentials do not match our records.', ['error'=>'Unauthorised']);
        }
        
        $updated_data = $user->update([
            'password' => $request->npassword,
        ]);
   
        return $this->sendResponse($updated_data, 'Password updated successfully.');
    }
}
