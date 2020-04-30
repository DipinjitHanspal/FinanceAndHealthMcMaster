<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {        
        // error_log(implode(",", $request->all('name', 'email', 'password')));
        error_log($request->name);
        error_log($request->password);
        error_log($request->email);
        // $params = $request->all('name', 'email', 'password', 'password_confirmation');
        $v = Validator::make($request->all('name', 'email', 'password'), [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password'  => 'required',
        ]);
        // $cst = implode(",", $params);
        // error_log($cst);
        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        $user = new User;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
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
