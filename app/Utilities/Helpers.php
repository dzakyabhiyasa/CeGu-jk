<?php

namespace App\Utilities;

class Helpers
{

    public static function errorRedirect($routeName, $message, $params = []){
        return redirect()->route($routeName, $params)->with('error', $message)->withInput()->send();
    }

    public static function successRedirect($routeName, $message, $params = []){
        return redirect()->route($routeName, $params)->with('success', $message)->send();
    }

}
