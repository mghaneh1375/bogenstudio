<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdminSolutionDigest;
use App\Http\Resources\SolutionDigest;
use App\Http\Resources\SolutionResource;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param string $lang
     * @return AnonymousResourceCollection
     */
    public function index(Request $request, $lang="en")
    {
        if($request->user() != null)
            return AdminSolutionDigest::collection(Solution::all())->additional(['status' => 'ok']);

        sleep(2);

        $solutions = Solution::visible()->get()->toArray();
        $org_lang = $lang;

        $parentCats = [];
        foreach ($solutions as $item) {

            $lang = $org_lang;

            if($item['title_' . $lang] == null ||
                empty($item['title_' . $lang])
            )
                $lang = $item['default_lang'];

            $tags = explode('_', $item['tags_' . $lang]);

            foreach ($tags as $tag) {

                $find = false;
                $node = null;

                foreach($parentCats as $itr) {
                    if($itr['tag'] === $tag) {
                        $find = true;
                        $node = $itr;
                        break;
                    }
                }

                if(!$find) {
                    $node = [
                        'tag' => $tag,
                        'sub' => []
                    ];
                }

                foreach (explode('_', $item['sub_tags_' . $lang]) as $subTag) {
                    if(!in_array($subTag, $node['sub']))
                        array_push($node['sub'], $subTag);
                }

                if(!$find)
                    array_push($parentCats, $node);

            }

        }

        $distinct_tags = [];
        $solution_tags = [];

        foreach ($solutions as $item) {

            $lang = $org_lang;

            if($item['title_' . $lang] == null ||
                empty($item['title_' . $lang])
            )
                $lang = $item['default_lang'];

            if($item['sub_tags_' . $lang] == null) {
                array_push($solution_tags, []);
                continue;
            }

            $tags = explode('_', $item['sub_tags_' . $lang]);
            array_push($solution_tags, $tags);

            foreach ($tags as $tag) {

                if(in_array($tag, $distinct_tags))
                    continue;

                array_push($distinct_tags, $tag);
            }

        }

        $all_tags = [];

        foreach ($distinct_tags as $tag) {

            $tag_items = [];

            $i = -1;

            foreach ($solutions as $item) {

                $i++;

                if(!in_array($tag, $solution_tags[$i]))
                    continue;

                array_push($tag_items, $item);
            }

            usort($tag_items, function ($a, $b) {
                return $a['priority'] - $b['priority'];
            });

            array_push($all_tags, ['tag' => $tag, 'items' => $tag_items, 'lang' => $org_lang]);
        }

        return SolutionDigest::collection($all_tags)->additional(
            [
                'status' => 'ok',
                'categories' => $parentCats
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'tags_en' => 'nullable|string',
            'sub_tags_en' => 'nullable|string',
            'title_en' => 'nullable|string',
            'digest_en' => 'nullable|string',
            'description_en' => 'nullable|string',
            'tags_fa' => 'nullable|string',
            'sub_tags_fa' => 'nullable|string',
            'title_fa' => 'nullable|string',
            'digest_fa' => 'nullable|string',
            'description_fa' => 'nullable|string',
            'tags_ar' => 'nullable|string',
            'sub_tags_ar' => 'nullable|string',
            'title_ar' => 'nullable|string',
            'digest_ar' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'tags_gr' => 'nullable|string',
            'sub_tags_gr' => 'nullable|string',
            'title_gr' => 'nullable|string',
            'digest_gr' => 'nullable|string',
            'description_gr' => 'nullable|string',
            'priority' => 'required|integer|min:1',
            'pic_file' => 'required|file',
            'default_lang' => ['required', Rule::in(['fa', 'ar', 'en', 'gr'])]
        ]);

        if($request->hasFile("pic_file") && $request->pic_file != null)
            $request["pic"] = str_replace("public/solutions/", "", $request->pic_file->store("public/solutions"));

        $request["visibility"] = true;
        Solution::create($request->toArray());
        return response()->json(['status' => 'ok']);
    }

    /**
     * Display the specified resource.
     *
     * @param Solution $solution
     * @return SolutionResource
     */
    public function show(Solution $solution)
    {
        return SolutionResource::make($solution)->additional(['status' => 'ok']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Solution $solution
     * @return Response
     */
    public function update(Request $request, Solution $solution)
    {
        $request->validate([
            'tags_en' => 'nullable|string',
            'sub_tags_en' => 'nullable|string',
            'title_en' => 'nullable|string',
            'digest_en' => 'nullable|string',
            'description_en' => 'nullable|string',
            'tags_fa' => 'nullable|string',
            'sub_tags_fa' => 'nullable|string',
            'title_fa' => 'nullable|string',
            'digest_fa' => 'nullable|string',
            'description_fa' => 'nullable|string',
            'tags_ar' => 'nullable|string',
            'sub_tags_ar' => 'nullable|string',
            'title_ar' => 'nullable|string',
            'digest_ar' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'tags_gr' => 'nullable|string',
            'sub_tags_gr' => 'nullable|string',
            'title_gr' => 'nullable|string',
            'digest_gr' => 'nullable|string',
            'description_gr' => 'nullable|string',
            'priority' => 'nullable|integer|min:1',
            'pic_file' => 'nullable|file',
            'default_lang' => ['nullable', Rule::in(['fa', 'ar', 'en', 'gr'])],
            'visibility' => 'nullable|boolean'
        ]);

        if($request->hasFile("pic_file") && $request->pic_file != null) {

            if(file_exists(__DIR__ . '/../../../storage/app/public/solutions/' . $solution->pic))
                unlink(__DIR__ . '/../../../storage/app/public/solutions/' . $solution->pic);

            $solution->pic = str_replace("public/solutions/", "", $request->pic_file->store("public/solutions"));
        }

        $solution->title_en = ($request->has('title_en')) ? $request['title_en'] : $solution->title_en;
        $solution->description_en = ($request->has('description_en')) ? $request['description_en'] : $solution->description_en;
        $solution->digest_en = ($request->has('digest_en')) ? $request['digest_en'] : $solution->digest_en;
        $solution->tags_en = ($request->has('tags_en')) ? $request['tags_en'] : $solution->tags_en;
        $solution->sub_tags_en = ($request->has('sub_tags_en')) ? $request['sub_tags_en'] : $solution->sub_tags_en;

        $solution->title_fa = ($request->has('title_fa')) ? $request['title_fa'] : $solution->title_fa;
        $solution->description_fa = ($request->has('description_fa')) ? $request['description_fa'] : $solution->description_fa;
        $solution->digest_fa = ($request->has('digest_fa')) ? $request['digest_fa'] : $solution->digest_fa;
        $solution->tags_fa = ($request->has('tags_fa')) ? $request['tags_fa'] : $solution->tags_fa;
        $solution->sub_tags_fa = ($request->has('sub_tags_fa')) ? $request['sub_tags_fa'] : $solution->sub_tags_fa;

        $solution->title_gr = ($request->has('title_gr')) ? $request['title_gr'] : $solution->title_gr;
        $solution->description_gr = ($request->has('description_gr')) ? $request['description_gr'] : $solution->description_gr;
        $solution->digest_gr = ($request->has('digest_gr')) ? $request['digest_gr'] : $solution->digest_gr;
        $solution->tags_gr = ($request->has('tags_gr')) ? $request['tags_gr'] : $solution->tags_gr;
        $solution->sub_tags_gr = ($request->has('sub_tags_gr')) ? $request['sub_tags_gr'] : $solution->sub_tags_gr;

        $solution->title_ar = ($request->has('title_ar')) ? $request['title_ar'] : $solution->title_ar;
        $solution->description_ar = ($request->has('description_ar')) ? $request['description_ar'] : $solution->description_ar;
        $solution->digest_ar = ($request->has('digest_ar')) ? $request['digest_ar'] : $solution->digest_ar;
        $solution->tags_ar = ($request->has('tags_ar')) ? $request['tags_ar'] : $solution->tags_ar;
        $solution->sub_tags_ar = ($request->has('sub_tags_ar')) ? $request['sub_tags_ar'] : $solution->sub_tags_ar;

        $solution->visibility = ($request->has('visibility')) ? $request['visibility'] : $solution->visibility;
        $solution->priority = ($request->has('priority')) ? $request['priority'] : $solution->priority;
        $solution->default_lang = ($request->has('default_lang')) ? $request['default_lang'] : $solution->default_lang;

        $solution->save();
        return response()->json(['status' => 'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Solution $solution
     * @return Response
     */
    public function destroy(Solution $solution)
    {
        if(file_exists(__DIR__ . '/../../../storage/app/public/solutions/' . $solution->pic))
            unlink(__DIR__ . '/../../../storage/app/public/solutions/' . $solution->pic);

        $solution->delete();
        return response()->json(["status" => "ok"]);
    }
}
