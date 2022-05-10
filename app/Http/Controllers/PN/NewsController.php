<?php

namespace App\Http\Controllers\PN;

use App\Models\Product;
use App\Http\Resources\AdminProductDigest;
use Illuminate\Http\Request;

class NewsController extends PNController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $lang="en")
    {

        if($request->user() != null)
            return AdminProductDigest::collection(Product::whereIsNews(true)->get())->additional(['status' => 'ok']);


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return parent::doStore($request, true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $news)
    {
        return parent::update($request, $news);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $news)
    {
        return parent::destroy($news);
    }
}
