<?php

namespace App\Http\Controllers\Api;

use App\Models\File;
use App\Models\Worker;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFileRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateFileRequest;

class FileController extends Controller
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
    public function store(StoreFileRequest $request)
    {
        if($request->hasFile('file')){
            $validated['file_path']=$request->file('file')->store("files/$request->id",'public');
            $validated['file_name']=$request->file->getClientOriginalName();
            $validated['worker_id']=$request->id;
            File::create($validated);
            return response()->json(['message' => 'Файл успешно загружен']);


        }

    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($workerId,$fileId)
    {
        $worker=Worker::find($workerId);
        $file=$worker->files()->find($fileId);

        if($file){
            $deleted=Storage::delete("public/$file->file_path");
            $file->delete();
        }
        else{
            return "Файл не найден";

        }
    }
}
