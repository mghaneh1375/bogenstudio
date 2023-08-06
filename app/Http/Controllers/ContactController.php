<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    public function getCountUnSeen() {
        return response()->json(
            [
                'status' => 'ok',
                'unseen' => Contact::whereSeen(false)->count()
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        DB::update('update contact set seen = 1 where 1');
        return ContactResource::collection(Contact::orderBy('id', 'desc')->get())->additional(['status' => 'ok']);
    }

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model3D  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(["status" => "ok"]);
    }

}
