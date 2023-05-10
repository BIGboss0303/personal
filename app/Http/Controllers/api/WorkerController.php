<?php

namespace App\Http\Controllers\Api;

use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkerRequest;
use App\Http\Requests\UpdateWorkerRequest;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        dd($request->category);
        return Worker::all();
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
    public function store(StoreWorkerRequest $request)
    {
        // dd($request);

        $validated = $request->validate([
            'worker_firstname'=>'required',
            'worker_middlename'=>'required',
            'worker_lastname'=>'required',
            'worker_address'=>'required',
            'worker_phone'=>'required',
            'worker_email'=>'email',
            'worker_telegram'=>'',
            'worker_description'=>'',
            'worker_education'=>'',
            'worker_experience'=>'',
            'worker_category'=>'required',
            'worker_skills'=>'',
            'worker_department'=>'',
            'worker_birthday'=>'',



        ]);

        if($request->hasFile('avatar')){
            $validated['worker_image']=$request->file('avatar')->store('avatars','public');
        }
        Worker::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show($workerId)
    {
        $worker= Worker::find($workerId);
        $schools= $worker->schools;
        $projects=$worker->projects;
        return $worker;

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Worker $worker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkerRequest $request, Worker $worker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker)
    {
        //
    }
}
