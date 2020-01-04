<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\User;

class TestController extends Controller {

    use AuthenticatesUsers;

    public function test() {
        return 'it works';
    }

    public function auth(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user                  = Auth::user();
            $username = $user->name;
            return response()->json([
              'status'   => 'success',
              'user' => $username,
            ]); 
          } else { 
            return response()->json([
              'status' => 'error',
              'user'   => 'Unauthorized Access'
            ]); 
          } 
  
    }
}