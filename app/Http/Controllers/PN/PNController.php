<?php

namespace App\Http\Controllers\PNController;

use App\Http\Resources\AdminProductDigest;
use App\Http\Resources\ProductDigest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\Rule;

class PNController extends Controller
{

    public static function index(Request $request, $isNews, $lang) {

        if($request->user() != null)
            return AdminProductDigest::collection(Product::whereIsNews($isNews)->get())->additional(['status' => 'ok']);

        $products = Product::whereIsNews($isNews)->visible()->toArray();
        $distinct_tags = [];
        $product_tags = [];

        foreach ($products as $product) {

            if($product['tags_' . $lang] == null) {
                array_push($product_tags, []);
                continue;
            }

            $tags = explode('_', $product['tags_' . $lang]);
            array_push($product_tags, $tags);

            foreach ($tags as $tag) {

                if(in_array($tag, $distinct_tags))
                    continue;

                array_push($distinct_tags, $tag);
            }

        }

        $all_tags = [];

        foreach ($distinct_tags as $tag) {

            $tag_products = [];

            $i = -1;

            foreach ($products as $product) {

                $i++;

                if(!in_array($tag, $product_tags[$i]))
                    continue;

                array_push($tag_products, $product);
            }

            usort($tag_products, function ($a, $b) {
                return $a['priority'] - $b['priority'];
            });

            array_push($all_tags, ['tag' => $tag, 'products' => $tag_products, 'lang' => $lang]);
        }

        return ProductDigest::collection($all_tags)->additional(['status' => 'ok']);
    }

    public static function store(Request $request, $isNews) {

        $request->validate([
            'tags_en' => 'nullable|string',
            'title_en' => 'nullable|string',
            'digest_en' => 'nullable|string',
            'description_en' => 'nullable|string',
            'tags_fa' => 'nullable|string',
            'title_fa' => 'nullable|string',
            'digest_fa' => 'nullable|string',
            'description_fa' => 'nullable|string',
            'tags_ar' => 'nullable|string',
            'title_ar' => 'nullable|string',
            'digest_ar' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'tags_gr' => 'nullable|string',
            'title_gr' => 'nullable|string',
            'digest_gr' => 'nullable|string',
            'description_gr' => 'nullable|string',
            'priority' => 'required|integer|min:1',
            'pic_file' => 'required|file',
            'default_lang' => ['required', Rule::in(['fa', 'ar', 'en', 'gr'])]
        ]);

        if($request->hasFile("pic_file") && $request->pic_file != null)
            $request["pic"] = str_replace("public/products/", "", $request->pic_file->store("public/products"));

        $request["visibility"] = true;
        $request["is_news"] = $isNews;

        Product::create($request->toArray());
        return response()->json(['status' => 'ok']);
    }

    public static function update(Request $request, Product $product)
    {
        $request->validate([
            'tags_en' => 'nullable|string',
            'title_en' => 'nullable|string',
            'digest_en' => 'nullable|string',
            'description_en' => 'nullable|string',
            'tags_fa' => 'nullable|string',
            'title_fa' => 'nullable|string',
            'digest_fa' => 'nullable|string',
            'description_fa' => 'nullable|string',
            'tags_ar' => 'nullable|string',
            'title_ar' => 'nullable|string',
            'digest_ar' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'tags_gr' => 'nullable|string',
            'title_gr' => 'nullable|string',
            'digest_gr' => 'nullable|string',
            'description_gr' => 'nullable|string',
            'priority' => 'nullable|integer|min:1',
            'pic_file' => 'nullable|file',
            'default_lang' => ['nullable', Rule::in(['fa', 'ar', 'en', 'gr'])],
            'visibility' => 'nullable|boolean'
        ]);

        if($request->hasFile("pic_file") && $request->pic_file != null) {

            if(file_exists(__DIR__ . '/../../../storage/app/public/products/' . $product->pic))
                unlink(__DIR__ . '/../../../storage/app/public/products/' . $product->pic);

            $product->pic = str_replace("public/products/", "", $request->pic_file->store("public/products"));
        }

        $product->title_en = ($request->has('title_en')) ? $request['title_en'] : $product->title_en;
        $product->description_en = ($request->has('description_en')) ? $request['description_en'] : $product->description_en;
        $product->digest_en = ($request->has('digest_en')) ? $request['digest_en'] : $product->digest_en;
        $product->tags_en = ($request->has('tags_en')) ? $request['tags_en'] : $product->tags_en;

        $product->title_fa = ($request->has('title_fa')) ? $request['title_fa'] : $product->title_fa;
        $product->description_fa = ($request->has('description_fa')) ? $request['description_fa'] : $product->description_fa;
        $product->digest_fa = ($request->has('digest_fa')) ? $request['digest_fa'] : $product->digest_fa;
        $product->tags_fa = ($request->has('tags_fa')) ? $request['tags_fa'] : $product->tags_fa;

        $product->title_gr = ($request->has('title_gr')) ? $request['title_gr'] : $product->title_gr;
        $product->description_gr = ($request->has('description_gr')) ? $request['description_gr'] : $product->description_gr;
        $product->digest_gr = ($request->has('digest_gr')) ? $request['digest_gr'] : $product->digest_gr;
        $product->tags_gr = ($request->has('tags_gr')) ? $request['tags_gr'] : $product->tags_gr;

        $product->title_ar = ($request->has('title_ar')) ? $request['title_ar'] : $product->title_ar;
        $product->description_ar = ($request->has('description_ar')) ? $request['description_ar'] : $product->description_ar;
        $product->digest_ar = ($request->has('digest_ar')) ? $request['digest_ar'] : $product->digest_ar;
        $product->tags_ar = ($request->has('tags_ar')) ? $request['tags_ar'] : $product->tags_ar;

        $product->visibility = ($request->has('visibility')) ? $request['visibility'] : $product->visibility;
        $product->priority = ($request->has('priority')) ? $request['priority'] : $product->priority;
        $product->default_lang = ($request->has('default_lang')) ? $request['default_lang'] : $product->default_lang;

        $product->save();

        return response()->json(['status' => 'ok']);
    }

    public static function destroy(Product $product)
    {
        if(file_exists(__DIR__ . '/../../../storage/app/public/products/' . $product->pic))
            unlink(__DIR__ . '/../../../storage/app/public/products/' . $product->pic);

        $product->delete();
        return response()->json(["status" => "ok"]);
    }
}
