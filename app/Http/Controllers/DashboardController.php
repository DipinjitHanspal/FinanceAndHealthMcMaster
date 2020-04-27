<?php

namespace App\Http\Controllers;

use App\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class DashboardController extends Controller
{
    public function setConfig(Request $request){
        $config = json_encode($request->only('config')['config']);
        Dashboard::setConfig(Auth::user()->id, $config);
    }

    public function loadConfig(Request $request) {
        $config = Dashboard::loadConfig(Auth::user()->id);
        return $config;
    }
}
