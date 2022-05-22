<?php

namespace App\Http\Controllers\PN;

use App\Http\Resources\NewsDigest;
use App\Http\Resources\ProductDigest;
use App\Models\Product;
use App\Http\Resources\AdminProductDigest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class NewsController extends PNController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param string $lang
     * @param int $limit
     * @return AnonymousResourceCollection
     */
    public function index(Request $request, $lang="en", $limit = -1)
    {
        if($request->user() != null)
            return AdminProductDigest::collection(Product::whereIsNews(true)->get())->additional(['status' => 'ok']);

        sleep(2);

        if($limit == -1)
            $news = Product::whereIsNews(true)->visible()->get()->toArray();
        else
            $news = Product::whereIsNews(true)->visible()->take($limit)->get()->toArray();

        $output = [];

        foreach ($news as $itr) {
            $itr['lang'] = $lang;
            array_push($output, $itr);
        }

        return NewsDigest::collection($output)->additional(['status' => 'ok']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return parent::doStore($request, true);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $news
     * @param Request $request
     * @return Response
     */
    public function show(Product $news)
    {
        return parent::show($news);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return Response
     */
    public function update(Request $request, Product $news)
    {
        return parent::update($request, $news);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return Response
     */
    public function destroy(Product $news)
    {
        return parent::destroy($news);
    }
}
