<?php

namespace App\Http\Controllers\PN;

use App\Http\Resources\AdminProductDigest;
use App\Http\Resources\ProductDigest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceForUser;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\Rule;

class ProductController extends PNController
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param string $lang
     * @param bool $organized
     * @return AnonymousResourceCollection
     */
    public function index(Request $request, $lang="en", $organized=true) {

        if($request->user() != null)
            return AdminProductDigest::collection(Product::whereIsNews(false)->get())->additional(['status' => 'ok']);

        $products = Product::whereIsNews(false)->visible()->orderBy('priority', 'desc')->get()->toArray();

        $distinct_tags = [];
        $product_tags = [];

        $org_lang = $lang;
        $output = [];

        foreach ($products as $product) {

            $lang = $org_lang;

            if($product['title_' . $lang] == null ||
                empty($product['title_' . $lang])
            )
                $lang = $product['default_lang'];

            if($organized) {
                if ($product['tags_' . $lang] == null) {
                    array_push($product_tags, []);
                    continue;
                }
            }

            $tags = explode('_', $product['tags_' . $lang]);

            if($organized)
                array_push($product_tags, $tags);


            foreach ($tags as $tag) {

                if(in_array($tag, $distinct_tags))
                    continue;

                array_push($distinct_tags, $tag);
            }

            if(!$organized) {
                $product['lang'] = $lang;
                array_push($output, $product);
            }

        }

        if(!$organized) {
            return ProductResourceForUser::collection($output)->additional(
                [
                    'status' => 'ok',
                    'tags' => $distinct_tags
                ]
            );
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        return parent::doStore($request, false);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @param Request $request
     * @param string $lang
     * @return AnonymousResourceCollection
     */
    public function show(Product $product)
    {
        return parent::show($product);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @param Request $request
     * @param string $lang
     * @return ProductResourceForUser
     */
    public function showToUser($lang, Product $product)
    {
        $product = $product->toArray();

        if($product['title_' . $lang] == null ||
            empty($product['title_' . $lang])
        )
            $lang = $product['default_lang'];

        return ProductResourceForUser::customMake($product, $lang)
            ->additional(['status' => 'ok']);
    }

    /**
     * Edit the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        return parent::update($request, $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        return parent::destroy($product);
    }
}
