<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Dashboard extends Model
{

    public static function setConfig(int $id, string $config){ 
        // error_log($config);
        DB::table('users')->where('id', $id)->update(array('dashboard-config' => $config));
    }

    public static function loadConfig(int $id) { 
        $config = DB::table('users')->where('id', $id)->value('dashboard-config');
        error_log($config);
        // Add default value if its empty
        if ($config == "{}") {
            $config = Dashboard::loadDefault();
            Dashboard::setConfig($id, json_encode($config));
        }
        return json_encode($config);
    }

    public static function loadDefault() {
        return '{"col1":[{"id":0,"type":"greeting","header":"Greeting"},{"id":1,"type":"value","value":"2200","header":"Average Calories"},{"id":2,"type":"nutrient","header":"Macros"}],"col2":[{"id":0,"type":"value","header":"Funds Remaining","value":"$2530"},{"id":1,"type":"burndown","header":"Burndown"}]}';
    }
}
