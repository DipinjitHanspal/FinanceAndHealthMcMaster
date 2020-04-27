<?php

namespace App\Http\Controllers;

use App\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class DashboardController extends Controller
{
    public function setConfig(Request $request){
        // error_log($request);
        $config = json_encode($request->only('config'));
        // error_log($config);
        Dashboard::setConfig(Auth::user()->id, $config);
    }

    public function loadConfig(Request $request) {
        $config = Dashboard::loadConfig(Auth::user()->id);
        error_log($config);
        return $config;
    }
}
