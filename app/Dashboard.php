<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Dashboard extends Model
{

    public static function setConfig(int $id, string $config){ 
        DB::table('users')->where('id', $id)->update(array('dashboard-config' => $config));
    }

    public static function loadConfig(int $id) { 
        $config = json_encode(DB::table('users')->find($id, ['dashboard-config']));
        $validator = Validator::make([$config], ['dashboard-config' => 'required']);
        // Add default value if its empty
        if ($validator->fails()) {
            $config = Dashboard::loadDefault();
            error_log($config);
            Dashboard::setConfig($id, $config);
        }
        return $config;
    }

    public static function loadDefault() {
        return json_encode('{"col1":[{"id":0,"type":"greeting","header":"Greeting"},{"id":1,"type":"value","value":"2200","header":"Average Calories"},{"id":2,"type":"nutrient","header":"Macros"}],"col2":[{"id":0,"type":"value","header":"Funds Remaining","value":"$2530"},{"id":1,"type":"burndown","header":"Burndown"}]}');
    }
}
