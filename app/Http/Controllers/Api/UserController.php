<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request) {

        $validator = Validator::make($request->all(),['username'=>'required|exists:users,username','password'=>'required']);

        if($validator->fails()){
            throw new ApiException("User not found!",1);
        }

        if(Auth::attempt(['username'=>$request->username,'password'=>$request->password])){
            /** 
             * @var App\Models\User
             *  */
            $user = Auth::user();
                return response()->json([
                    'result'=>true,
                    'token'=>$user->createToken('apitoken')->accessToken,
                    'name'=>$user->getName()
                ]);
        } else {
            throw new APIException("Password incorrect!",2);
        }

    }
}
