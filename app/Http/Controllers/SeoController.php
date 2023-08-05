<?php

namespace App\Http\Controllers;

use App\Models\Seo;
use App\Http\Resources\SeoDigest;
use App\Http\Resources\SeoResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SeoDigest::collection(Seo::whereAdditionalId(null)->get())->additional(["status" => "ok"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function show(Seo $seo)
    {
        return SeoResource::make($seo)->additional(["status" => "ok"]);
    }

    /**
     * store the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($section, $additionalId, Request $request)
    {

        if($section !== 'news' && $section !== 'video' && 
            $section !== 'solution' && $section !== 'product'
        )
            return response()->json(['status' => 'nok', 'msg' => 'invalid section']);

        $request->validate([
            'default_lang' => ['required', Rule::in(['fa', 'ar', 'en', 'gr'])],
            'article_tag_en' => 'nullable|string',
            'keyword_en' => 'nullable|string',
            'description_en' => 'nullable|string|max:150|min:2',
            'article_tag_fa' => 'nullable|string',
            'keyword_fa' => 'nullable|string',
            'description_fa' => 'nullable|string|max:150|min:2',
            'article_tag_gr' => 'nullable|string',
            'keyword_gr' => 'nullable|string',
            'description_gr' => 'nullable|string|max:150|min:2',
            'article_tag_ar' => 'nullable|string',
            'keyword_ar' => 'nullable|string',
            'description_ar' => 'nullable|string|max:150|min:2',
        ]);

        $seo = new Seo();
        $seo->page = $section;
        $seo->additional_id = $additionalId;
        $seo->default_lang = $request['default_lang'];

        $seo->article_tag_en = ($request->has('article_tag_en')) ? $request['article_tag_en'] : '';
        $seo->keyword_en = ($request->has('keyword_en')) ? $request['keyword_en'] : '';
        $seo->description_en = ($request->has('description_en')) ? $request['description_en'] : '';
        
        $seo->article_tag_fa = ($request->has('article_tag_fa')) ? $request['article_tag_fa'] : '';
        $seo->keyword_fa = ($request->has('keyword_fa')) ? $request['keyword_fa'] : '';
        $seo->description_fa = ($request->has('description_fa')) ? $request['description_fa'] : '';
        
        $seo->article_tag_gr = ($request->has('article_tag_gr')) ? $request['article_tag_gr'] : '';
        $seo->keyword_gr = ($request->has('keyword_gr')) ? $request['keyword_gr'] : '';
        $seo->description_gr = ($request->has('description_gr')) ? $request['description_gr'] : '';
        
        $seo->article_tag_ar = ($request->has('article_tag_ar')) ? $request['article_tag_ar'] : '';
        $seo->keyword_ar = ($request->has('keyword_ar')) ? $request['keyword_ar'] : '';
        $seo->description_ar = ($request->has('description_ar')) ? $request['description_ar'] : '';

        $seo->save();
        return response()->json(['status' => 'ok']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seo $seo)
    {
        $request->validate([
            'article_tag_en' => 'nullable|string',
            'default_lang' => ['nullable', Rule::in(['fa', 'ar', 'en', 'gr'])],
            'keyword_en' => 'nullable|string',
            'description_en' => 'nullable|string|max:150|min:2',
            'article_tag_fa' => 'nullable|string',
            'keyword_fa' => 'nullable|string',
            'description_fa' => 'nullable|string|max:150|min:2',
            'article_tag_gr' => 'nullable|string',
            'keyword_gr' => 'nullable|string',
            'description_gr' => 'nullable|string|max:150|min:2',
            'article_tag_ar' => 'nullable|string',
            'keyword_ar' => 'nullable|string',
            'description_ar' => 'nullable|string|max:150|min:2',
        ]);

        $seo->article_tag_en = ($request->has('article_tag_en')) ? $request['article_tag_en'] : $seo->article_tag_en;
        $seo->keyword_en = ($request->has('keyword_en')) ? $request['keyword_en'] : $seo->keyword_en;
        $seo->description_en = ($request->has('description_en')) ? $request['description_en'] : $seo->description_en;
        
        $seo->article_tag_fa = ($request->has('article_tag_fa')) ? $request['article_tag_fa'] : $seo->article_tag_fa;
        $seo->keyword_fa = ($request->has('keyword_fa')) ? $request['keyword_fa'] : $seo->keyword_fa;
        $seo->description_fa = ($request->has('description_fa')) ? $request['description_fa'] : $seo->description_fa;
        
        $seo->article_tag_gr = ($request->has('article_tag_gr')) ? $request['article_tag_gr'] : $seo->article_tag_gr;
        $seo->keyword_gr = ($request->has('keyword_gr')) ? $request['keyword_gr'] : $seo->keyword_gr;
        $seo->description_gr = ($request->has('description_gr')) ? $request['description_gr'] : $seo->description_gr;
        
        $seo->article_tag_ar = ($request->has('article_tag_ar')) ? $request['article_tag_ar'] : $seo->article_tag_ar;
        $seo->keyword_ar = ($request->has('keyword_ar')) ? $request['keyword_ar'] : $seo->keyword_ar;
        $seo->description_ar = ($request->has('description_ar')) ? $request['description_ar'] : $seo->description_ar;

        $seo->default_lang = ($request->has('default_lang')) ? $request['default_lang'] : $seo->default_lang;

        $seo->save();
        return response()->json(['status' => 'ok']);
    }

}
