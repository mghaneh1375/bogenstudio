<?php

namespace App\Http\Controllers;

use App\Http\Resources\VideoDigest;
use App\Models\Product;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $lang
     * @param int $limit
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index($lang, $limit = -1, Request $request)
    {
        $videos = ($limit == -1) ? Video::all() : Video::take($limit)->get();
        foreach ($videos as $video)
            $video->lang = $lang;

        return VideoDigest::collection($videos)->additional(['status' => 'ok']);
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
            'preview_file' => 'required|image',
            'video_file' => 'required|file|mimes:mp4',
            'priority' => 'required|integer|min:1',
            'title_fa' => 'required|string|min:1',
            'description_fa' => 'required|string|min:1',
            'title_en' => 'required|string|min:1',
            'description_en' => 'required|string|min:1',
            'title_ar' => 'required|string|min:1',
            'description_ar' => 'required|string|min:1',
            'title_gr' => 'required|string|min:1',
            'description_gr' => 'required|string|min:1'
        ]);

        if($request->hasFile("video_file") && $request->video_file != null)
            $request["file"] = str_replace("public/videos/", "", $request->video_file->store("public/videos"));

        if($request->hasFile("preview_file") && $request->preview_file != null)
            $request["preview"] = str_replace("public/videos/", "", $request->preview_file->store("public/videos"));

        Video::create($request->toArray());
        return response()->json(['status' => 'ok']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
