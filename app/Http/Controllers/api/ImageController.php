<?php

namespace App\Http\Controllers\Api;

use App\Models\Image;
use App\Http\Controllers\Controller;
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
            $validated['image_path']=$request->file('image')->store("images/$request->id",'public');
            $validated['worker_id']=$request->id;
            Image::create($validated);

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
    public function destroy($workerId,$image_id)
    {
        dd(4);
        $user=User::find($workerId);
        $image=$user->images()->find($image_id);
        if($image){
            Storage::delete($image->path);
            $image->delete();
        }
        else{
            return "fuck you";
        }
    }
}
