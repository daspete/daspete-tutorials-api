<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AuthController extends BaseController {

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['login']]);
    }


    /**
     * Get a JWT token via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(){
        // get email and password fields from the POST data array
        $credentials = Input::only('email', 'password');

        // try to generate a token and send an error if it fails
        if(!$token = $this->guard()->attempt($credentials)){
            return response()->json(array(
                'error' => 'login_failed'
            ), 401);
        }

        // send the generated token for the user
        return $this->respondWithToken($token);
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(){
        // logging out
        $this->guard()->logout();

        // inform the user, that we are logged out
        return response()->json(array(
            'logout' => true
        ), 200);
    }


    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(){
        // send the user datas
        return response()->json($this->guard()->user(), 200);
    }



    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(){
        return $this->respondWithToken($this->guard()->refresh());
    }



    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard(){
        return Auth::guard();
    }



    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ], 200);
    }

    


}