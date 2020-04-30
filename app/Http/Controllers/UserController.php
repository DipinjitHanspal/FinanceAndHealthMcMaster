<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(
            [
                'status' => 'success',
                'users' => $users->toArray()
            ], 200);
    }
    public function show(Request $request, $id)
    {
        $user = User::find($id);
        return response()->json(
            [
                'status' => 'success',
                'user' => $user->toArray()
            ], 200);
    }

    public function adminCheck(Request $request) {
        error_log("Admin check");
        return response()->json([], 404);
        error_log(User::user()->id);
        if (User::user()->role === 2) {
            return response()->json(['role' => 2]);
        } 
        return response()->json(['role' => 1]);
    }
}