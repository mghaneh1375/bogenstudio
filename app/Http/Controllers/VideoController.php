<?php

namespace App\Http\Controllers;

use App\Http\Resources\VideoDigest;
use App\Http\Resources\VideoResource;
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
    public function index(Request $request, $lang = "en", $limit = -1)
    {

        $videos = ($limit == -1 || $request->user() != null) ? Video::all() : Video::take($limit)->get();
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

        $request["visibility"] = true;

        Video::create($request->toArray());
        return response()->json(['status' => 'ok']);
    }

    /**
     * Display the specified resource.
     *
     * @param Video $video
     * @return VideoResource
     */
    public function show(Video $video)
    {
        return VideoResource::make($video)->additional(['status' => 'ok']);
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
        $request->validate([
            'preview_file' => 'nullable|image',
            'video_file' => 'nullable|file|mimes:mp4',
            'priority' => 'nullable|integer|min:1',
            'title_fa' => 'nullable|string|min:1',
            'description_fa' => 'nullable|string|min:1',
            'title_en' => 'nullable|string|min:1',
            'description_en' => 'nullable|string|min:1',
            'title_ar' => 'nullable|string|min:1',
            'description_ar' => 'nullable|string|min:1',
            'title_gr' => 'nullable|string|min:1',
            'description_gr' => 'nullable|string|min:1',
            'visibility' => 'nullable|boolean',
        ]);


        if($request->hasFile("preview_file") && $request->preview_file != null) {

            if(file_exists(__DIR__ . '/../../../storage/app/public/videos/' . $video->preview))
                unlink(__DIR__ . '/../../../storage/app/public/videos/' . $video->preview);

            $video->preview = str_replace("public/videos/", "", $request->preview_file->store("public/videos"));
        }

        if($request->hasFile("video_file") && $request->video_file != null) {

            if(file_exists(__DIR__ . '/../../../storage/app/public/videos/' . $video->file))
                unlink(__DIR__ . '/../../../storage/app/public/videos/' . $video->file);

            $video->file = str_replace("public/videos/", "", $request->video_file->store("public/videos"));
        }


        $video->title_en = ($request->has('title_en')) ? $request['title_en'] : $video->title_en;
        $video->description_en = ($request->has('description_en')) ? $request['description_en'] : $video->description_en;

        $video->title_fa = ($request->has('title_fa')) ? $request['title_fa'] : $video->title_fa;
        $video->description_fa = ($request->has('description_fa')) ? $request['description_fa'] : $video->description_fa;

        $video->title_gr = ($request->has('title_gr')) ? $request['title_gr'] : $video->title_gr;
        $video->description_gr = ($request->has('description_gr')) ? $request['description_gr'] : $video->description_gr;

        $video->title_ar = ($request->has('title_ar')) ? $request['title_ar'] : $video->title_ar;
        $video->description_ar = ($request->has('description_ar')) ? $request['description_ar'] : $video->description_ar;

        $video->visibility = ($request->has('visibility')) ? $request['visibility'] : $video->visibility;
        $video->priority = ($request->has('priority')) ? $request['priority'] : $video->priority;

        $video->save();
        return response()->json(['status' => 'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {

        if(file_exists(__DIR__ . '/../../../storage/app/public/videos/' . $video->preview))
            unlink(__DIR__ . '/../../../storage/app/public/videos/' . $video->preview);

        if(file_exists(__DIR__ . '/../../../storage/app/public/videos/' . $video->file))
            unlink(__DIR__ . '/../../../storage/app/public/videos/' . $video->file);

        $video->delete();
        return response()->json(["status" => "ok"]);

    }
}
