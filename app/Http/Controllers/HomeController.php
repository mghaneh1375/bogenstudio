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

    private function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){

            if (array_key_exists($key, $_SERVER) === true){

                foreach (explode(',', $_SERVER[$key]) as $ip){

                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }

    function contactMe(Request $request) {

        $request->validate([
            'name' => 'required|string|min:1|max:171',
            'mail' => 'required|email|unique:contact,mail',
            'phone' => 'required|numeric|unique:contact,phone'
        ]);

        $ip = $this->getIp();
        if(Contact::whereIp($ip)->count() > 0)
            return response()->json([
                'status' => 'nok',
                'msg' => 'duplicate ip'
            ]);

        $request['ip'] = $ip;
        Contact::create($request->toArray());

        return response()->json(['status' => 'ok']);
    }

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
