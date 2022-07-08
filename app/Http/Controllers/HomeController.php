<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use App\Models\User;
use App\Models\Seo;
use App\Models\Solution;
use App\Models\Product;
use App\Models\Video;
use App\Http\Resources\SeoResourceForUser as SeoResource;
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

    private function goToPageWithSeo($page, $addId, $view, $locale, 
        $pic = null, $itemKey = null, $name = null, $description = null,
        $createdAt = null
    ) {
        
        $seo = Seo::wherePage($page)->whereAdditionalId($addId)->first();
        
        if($seo == null) {
            if($itemKey != null)
                return view($view, ['seo' => null, 'pic' => null, 
                    $itemKey => $addId, 'digest' => $description, 'name' => $name,
                    'createdAt' => $createdAt
                ]);
                
            return view($view, ['seo' => null, 'pic' => null]);
        }

        if($seo['keyword_' . $locale] == null ||
            empty($seo['keyword_' . $locale])
        )
            $locale = $seo['default_lang'];

        $seo = SeoResource::customMake($seo, $locale);
        
        if($itemKey != null)
            return view($view, ['seo' => $seo, 'pic' => $pic, 
                $itemKey => $addId, 'name' => $name, 'digest' => $description,
                'createdAt' => $createdAt
        ]);

        return view($view, ['seo' => $seo, 'pic' => $pic]);
    }

    public function home($locale) {
        return $this->goToPageWithSeo('home', null, 'welcome', $locale);
    }
    
    public function news($locale) {
        $product = Product::whereIsNews(1)->first();
        $pic = null;
        if($product != null)
            $pic = asset('storage/products/' . $product->pic);
            
        return $this->goToPageWithSeo('newsList', null, 'allNews', $locale, $pic);
    }
    
    public function solutions($locale) {
        $solution = Solution::first();
        $pic = null;
        if($solution != null)
            $pic = asset('storage/solutions/' . $solution->pic);

        return $this->goToPageWithSeo('solutions', null, 'solutions', $locale, $pic);
    }
    
    public function products($locale) {
        $product = Product::whereIsNews(0)->first();
        $pic = null;
        if($product != null)
            $pic = asset('storage/products/' . $product->pic);
        return $this->goToPageWithSeo('products', null, 'products', $locale, $pic);
    }

    public function product($lang, $productId) {
        
        $product = Product::whereId($productId)->first();
        if($product == null)
            return Redirect::route('home', ['locale' => $lang]);

        $isNews = $product->is_news;
        $createdAt = $product->created_at;

        $product = $product->toArray();

        $pic = asset('storage/products/' . $product['pic']);

        $name = ($product['title_' . $lang] == null || empty($product['title_' . $lang])) ? $product['title_' . $product['default_lang']] : $product['title_' . $lang];
        $description = ($product['digest_' . $lang] == null || empty($product['digest_' . $lang])) ? $product['digest_' . $product['default_lang']] : $product['digest_' . $lang];
        
        return $this->goToPageWithSeo(
            ($isNews) ? 'news' : 'product', $productId, 'product', $lang, 
            $pic, 'productId', $name, $description, $createdAt
        );
    }
    
    public function solution($lang, $solutionId) {

        $solution = Solution::whereId($solutionId)->first();
        if($solution == null)
            return Redirect::route('home', ['locale' => $lang]);

        $createdAt = $solution->created_at;
        $solution = $solution->toArray();

        $pic = asset('storage/solutions/' . $solution['pic']);

        $name = ($solution['title_' . $lang] == null || empty($solution['title_' . $lang])) ? $solution['title_' . $solution['default_lang']] : $solution['title_' . $lang];
        $description = ($solution['digest_' . $lang] == null || empty($solution['digest_' . $lang])) ? $solution['digest_' . $solution['default_lang']] : $solution['digest_' . $lang];
        
        return $this->goToPageWithSeo(
            'solution', $solutionId, 'solution', $lang, 
            $pic, 'solutionId', $name, $description, $createdAt
        );
    }
    
    public function video($lang, $videoId) {

        $video = Video::whereId($videoId)->first();
        if($video == null)
            return Redirect::route('home', ['locale' => $lang]);

        $createdAt = $video->created_at;
        $video = $video->toArray();

        $pic = asset('storage/videos/' . $video['preview']);

        $name = ($video['title_' . $lang] == null || empty($video['title_' . $lang])) ? $video['title_' . $video['default_lang']] : $video['title_' . $lang];
        $description = ($video['description_' . $lang] == null || empty($video['description_' . $lang])) ? $video['description_' . $video['default_lang']] : $video['description_' . $lang];
        
        return $this->goToPageWithSeo(
            'video', $videoId, 'video', $lang, 
            $pic, 'videoId', $name, $description, $createdAt
        );
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

    public function uploadTest(Request $request) {

        $request->validate([
            'upload' => 'required|image|max:4096'
        ]);

        if($request->hasFile("upload") && $request->upload != null) {
            $name = str_replace("public/tmp/", "", $request->upload->store("public/tmp"));
            return response()->json(['url' => asset('storage/tmp/' . $name)]);
        }
    }
}
