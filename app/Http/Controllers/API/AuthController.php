<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){

        $validator=Validator::make($request->all(),[
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:3|max:100',
            'confirm_password'=>'required|string|min:3|max:100'
        ]);

        if( $validator->fails()){
            return response()->json([
                'errors'=>$validator->messages(),
                'status'=>422]);
        }else{
        $user=new User();
        $user->fill($request->only([
            'name',
            'email'
        ]));
        $user->password=Hash::make($request->password);
        $user->save();

          $token=$user->createToken($user->email.'_Token')->plainTextToken;
          return response()->json([
              'status'=>200,
              'user_name'=>$user->name,
              'token'=>$token,
            'message'=>'register success'

          ]);
        }
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string|min:3|max:100']);
            $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json([
            'status'=>401
        ]);
    }else{
        $token=$user->createToken($user->email.'_Token')->plainTextToken;
        return response()->json([
            'status'=>200,
            'user_name'=>$user->name,
            'token'=>$token,
            'message'=>'logged success'
        ]);
    }


        }
        public function logout(){
            auth()->user()->tokens()->delete();
            return response()->json([
                'status'=>200,
                'message'=>'logout success'
            ]);
        }

// }
}
