<?php

namespace App\Http\Controllers;

use App\Http\Resources\Model3DResource;
use App\Models\Model3D;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        if($request->user() == null)
            return Model3DResource::collection(Model3D::visible()->orderBy('priority', 'asc')->get())->additional(['status' => 'ok']);

        return Model3DResource::collection(Model3D::orderBy('priority', 'asc')->get())->additional(['status' => 'ok']);
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
            'model_file' => 'required|file', //|mimes:fbx
            'texture_file' => 'nullable|file',
            'priority' => 'required|integer|min:1'
        ]);

        if($request->hasFile("texture_file") && $request->texture_file != null)
            $request["texture"] = str_replace("public/models/", "", $request->texture_file->store("public/models"));

        if($request->hasFile("model_file") && $request->model_file != null)
            $request["model"] = str_replace("public/models/", "", $request->model_file->store("public/models"));
        else
            abort(401);

        $request["visibility"] = true;

        Model3D::create($request->toArray());
        return response()->json(['status' => 'ok']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model3D  $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model3D $model)
    {
        $request->validate([
            'model_file' => 'nullable|file', //|mimes:fbx
            'texture_file' => 'nullable|file',
            'priority' => 'nullable|integer|min:1',
            'visibility' => 'nullable|boolean'
        ]);

        if($request->hasFile("texture_file") && $request->texture_file != null) {

            if(file_exists(__DIR__ . '/../../../public/storage/models/' . $model->texture))
                unlink(__DIR__ . '/../../../public/storage/models/' . $model->texture);

            $model->texture = str_replace("public/models/", "", $request->texture_file->store("public/models"));
        }

        if($request->hasFile("model_file") && $request->model_file != null) {

            if(file_exists(__DIR__ . '/../../../public/storage/models/' . $model->model))
                unlink(__DIR__ . '/../../../public/storage/models/' . $model->model);

            $model->model = str_replace("public/models/", "", $request->model_file->store("public/models"));
        }

        $model->visibility = ($request->has('visibility')) ? $request->visibility : $model->visibility;
        $model->priority = ($request->has('priority')) ? $request->priority : $model->priority;

        $model->save();

        return response()->json(['status' => 'ok']);
    }

    /**
     * Display the specified resource.
     *
     * @param Model3D $model
     * @return Model3DResource
     */
    public function show(Model3D $model)
    {
        return Model3DResource::make($model)->additional(['status' => 'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model3D  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model3D $model)
    {

        if(file_exists(__DIR__ . '/../../../storage/app/public/models/' . $model->texture))
            unlink(__DIR__ . '/../../../storage/app/public/models/' . $model->texture);

        if(file_exists(__DIR__ . '/../../../storage/app/public/models/' . $model->model))
            unlink(__DIR__ . '/../../../storage/app/public/models/' . $model->model);

        $model->delete();
        return response()->json(["status" => "ok"]);

    }
}
