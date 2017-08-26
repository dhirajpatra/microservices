<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param $name
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function github($name)
    {
        $options = array('http' => array('user_agent' => $_SERVER['HTTP_USER_AGENT']));

        $context = stream_context_create($options);
        $url = "https://api.github.com/users/" . urlencode($name);
        $result = json_decode(file_get_contents($url, true, $context));

        return response([
            'result' => $result
        ]);
    }

    //
}
