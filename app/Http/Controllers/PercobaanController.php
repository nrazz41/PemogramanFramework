<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PercobaanController extends Controller
{
    function informasi() {
         phpinfo();
    }

    function function2($param1)
    {
        $hash = hash('sha256', $param1);
        return $hash;
    }

    function function3($param1, $param2) {
        $random_number = rand($param1, $param2);
        return $random_number;
    }

}
