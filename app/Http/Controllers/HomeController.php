<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {


    public function changeLanguage(Request $request, $lang)
    {
        App::setLocale($lang);
        session()->put('locale', $request->lang);

        $url = url()->previous();
        $lang = '/' . $lang . '/';

        $url = str_replace("/en/", $lang, $url);
        $url = str_replace("/gr/", $lang, $url);
        $url = str_replace("/ar/", $lang, $url);
        $url = str_replace("/fa/", $lang, $url);

        return redirect()->to($url);
    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return Redirect::route('home', ['locale' => App::getLocale()]);
    }

    public function changePass() {

    }

    public function doLogin(Request $request) {

        $request->validate([
            'username' => 'required|string|min:1',
            'password' => 'required|string|min:1'
        ]);

        $username = self::makeValidInput($request["username"]);
        $password = self::makeValidInput($request["password"]);

        $user = User::whereUsername($username)->first();
        if($username == null)
            return response()->json([
                "status" => "nok",
                "msg" => "username or password is incorrect"
            ]);

        if(!Hash::check($password, $user->password)) {
            return response()->json([
                "status" => "nok",
                "msg" => "username or password is incorrect"
            ]);
        }

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();

        return response()->json(["status" => "ok", "token" => $tokenResult->accessToken]);
    }

}
