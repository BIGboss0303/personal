<?php

namespace App\Http\Controllers\Api;

use App\Models\Image;
use App\Models\Worker;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request)
    {
        if($request->hasFile('image')){
            $validated['image_name']=$request->image->getClientOriginalName();
            $validated['image_path']=$request->file('image')->store("images/$request->id",'public');
            $validated['worker_id']=$request->id;
            Image::create($validated);
            return response()->json(['message' => 'Изображение успешно загружено']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($workerId,$imageId)
    {
        $worker=Worker::find($workerId);

        $image=$worker->images()->find($imageId);

        if($image){
            $deleted=Storage::delete("public/$image->image_path");
            if($deleted){
                $image->delete();
            }
            else {
                return "Изображение не было удаленно";
            }
        }
        else{
            return "Изображение не найденно";
        }
    }
}
