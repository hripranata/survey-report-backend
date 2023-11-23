<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\PasswordReset;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class AuthController extends BaseController
{
    public function connectionTest() 
    {
        try {
            DB::connection()->getPdo();
            // echo "Connected successfully to: " . DB::connection()->getDatabaseName();
            return $this->sendResponse([], 'Connection test successfully.');
        } catch (\Exception $e) {
            // die("Could not connect to the database. Please check your configuration. error:" . $e );
            return $this->sendError('Could not connect to the database.', ['error'=>'Connection error.']);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
        ];

        $response = [
            'user'      => $data,
            'token'     => $token
        ];

        return $this->sendResponse($response, 'User register successfully.');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $user = User::where('nik', $request->username)->first();
        
        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->sendError('These credentials do not match our records.', ['error'=>'Unauthorised']);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        $data = [
            'id' => $user->id,
            'name' => $user->name,
            'nik' => $user->nik,
            'email' => $user->email,
            'role' => $user->role,
            'phone' => $user->phone,
            'address' => $user->address,
        ];
        
        $response = [
            'user'      => $data,
            'token'     => $token
        ];
   
        return $this->sendResponse($response, 'User login successfully.');
    }

    public function sendPasswordResetToken(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return $this->sendError('These credentials do not match our records.', ['error'=>'Unauthorised']);
        }

        DB::table('password_reset_tokens')->where('email', $user->email)->delete();

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $user->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        $format = [
            'greeting' => 'Hi '.$user->name.',',
            'body' => 'A request has been received to change the password for your account.',
            'notice' => 'If you did not request a password reset, you can safely ignore this email.',
            'thanks' => 'Thank you',
            'actionText' => 'Reset Link',
            'actionURL' => url('http://localhost:5173/reset_password/' . $token),
        ];

        Notification::send($user, new PasswordReset($format));
   
        return $this->sendResponse([], 'Password reset link send successfully.');
    }

    public function tokenValidation(Request $request)
    {
        $validToken = DB::table('password_reset_tokens')->where('token', $request->token)->first();

        if(!$validToken){
            return $this->sendError('Invalid Token!', ['error'=>'Unauthorised']);
        }

        return $this->sendResponse([], 'Token is Valid.');
    }

    public function validatePasswordResetToken(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $updatePassword = DB::table('password_reset_tokens')->where([
            'email' => $request->email, 
            'token' => $request->token
        ])->first();

        if(!$updatePassword){
            return $this->sendError('Invalid token!', $validator->errors());
        }

        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();

        return $this->sendResponse([], 'Password update successfully.');
    }

}
