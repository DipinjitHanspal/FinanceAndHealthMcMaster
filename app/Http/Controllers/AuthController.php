<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

// class AuthController extends Controller
// {
//     /**
//      * Create a new AuthController instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('auth:api', ['except' => ['login']]);
//     }

//     /**
//      * Get a JWT token via given credentials.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      *
//      * @return \Illuminate\Http\JsonResponse
//      */
//     public function login(Request $request)
//     {
//         $credentials = $request->only('email', 'password');
//         $data = $request->all();
//         if(empty($data)) {
//             $data = json_decode($request->getContent());
//             $data = json_decode($data);
//         }
//         error_log(print_r($data, TRUE));

//         if ($token = $this->guard()->attempt($credentials)) {
//             return $this->respondWithToken($token);
//         }

//         return response()->json(['error' => 'Unauthorized'], 401);
//     }

//     /**
//      * Get the authenticated User
//      *
//      * @return \Illuminate\Http\JsonResponse
//      */
//     public function me()
//     {
//         return response()->json($this->guard()->user());
//     }

//     /**
//      * Log the user out (Invalidate the token)
//      *
//      * @return \Illuminate\Http\JsonResponse
//      */
//     public function logout()
//     {
//         $this->guard()->logout();

//         return response()->json(['message' => 'Successfully logged out']);
//     }

//     /**
//      * Refresh a token.
//      *
//      * @return \Illuminate\Http\JsonResponse
//      */
//     public function refresh()
//     {
//         return $this->respondWithToken($this->guard()->refresh());
//     }

//     /**
//      * Get the token array structure.
//      *
//      * @param  string $token
//      *
//      * @return \Illuminate\Http\JsonResponse
//      */
//     protected function respondWithToken($token)
//     {
//         return response()->json([
//             'access_token' => $token,
//             'token_type' => 'bearer',
//             'expires_in' => $this->guard()->factory()->getTTL() * 60
//         ]);
//     }

//     /**
//      * Get the guard to be used during authentication.
//      *
//      * @return \Illuminate\Contracts\Auth\Guard
//      */
//     public function guard()
//     {
//         return Auth::guard();
//     }
// }

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $v = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password'  => 'required|min:3|confirmed',
        ]);
        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        $user = new User;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json(['status' => 'success'], 200);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            return response()->json(['status' => 'success'], 200)->header('Authorization', $token);
        }
        return response()->json(['error' => 'login_error'], 401);
    }
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }
    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }
    // public function refresh()
    // {
    //     if ($token = $this->guard()->refresh()) {
    //         return response()
    //             ->json(['status' => 'successs'], 200)
    //             ->header('Authorization', $token);
    //     }
    //     return response()->json(['error' => 'refresh_token_error'], 401);
    // }

    public function refresh()
    {
        return response([
            'status' => 'success'
        ]);
    }

    private function guard()
    {
        return Auth::guard();
    }
}
