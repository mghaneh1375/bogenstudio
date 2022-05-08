<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    static function myPostIsset($keys) {

        if(is_array($keys)) {

            foreach ($keys as $key) {
                if (!isset($_POST[$key]) || empty($_POST[$key]))
                    return false;
            }
        }
        else {
            if (!isset($_POST[$keys]) || empty($_POST[$keys]))
                return false;
        }

        return true;
    }

    static function makeValidInput($input) {
        $input = addslashes($input);
        $input = trim($input);
        if(get_magic_quotes_gpc())
            $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
}
