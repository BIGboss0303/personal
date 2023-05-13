<?php

namespace App\Http\Controllers\Api;

use App\Models\School;
use App\Models\Worker;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkerResource;
use App\Http\Resources\WorkerCollection;
use App\Http\Requests\StoreWorkerRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateWorkerRequest;
use App\Models\Department;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $workers=Worker::all();
        // $categories=$workers->categories;

        return new WorkerCollection($workers);
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
        $validator = Validator::make($request->all(), [
            'worker_name'=>'required',
            'worker_address'=>'required',
            'worker_phone'=>'required',
            'worker_email'=>'email',
            'worker_telegram'=>'',
            'worker_description'=>'',
            'worker_education'=>'',
            'worker_experience'=>'',
            'worker_skills'=>'',
            'worker_department'=>'',
            'worker_birthday'=>'',
            'worker_car'=>'',
            'worker_laptop'=>'',

          ]);
        if ($validator->fails()){
            return $validator->errors();
        }
        $validated=$validator->valid();
        if($request->hasFile('avatar')){
            $validated['worker_image']=$request->file('avatar')->store("images/$request->id/avatars",'public');
        }
        $worker=Worker::create($validated);
        
        if(isset($request->school)){
            $school=School::where('school_name',$request->school)->first();
            $worker->schools()->attach($school->id);
        }
        if(isset($request->department)){
            $department=Department::where('department_name',$request->department)->first();
            $worker->departments()->attach($department->id);
        }

        if(isset($request->project)){
            $project=Project::where('project_name',$request->project)->first();
            $worker->projects()->attach($project->id);
        }
        if(isset($request->category)){
            $category=Category::where('category_name',$request->category)->first();
            $worker->categories()->attach($category->id);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($workerId)
    {
        $worker= Worker::find($workerId);
        return new WorkerResource($worker);

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
    public function update(UpdateWorkerRequest $request)
    {
        
        $worker=Worker::find($request->id);
        $validator = Validator::make($request->all(), [
            'worker_name'=>'required',
            'worker_address'=>'required',
            'worker_phone'=>'required',
            'worker_email'=>'email',
            'worker_telegram'=>'',
            'worker_description'=>'',
            'worker_education'=>'',
            'worker_experience'=>'',
            'worker_skills'=>'',
            'worker_department'=>'',
            'worker_birthday'=>'',
            'worker_car'=>'',
            'worker_laptop'=>'',

          ]);
        if ($validator->fails()){
            return $validator->errors();
        }
        $validated=$validator->valid();
        if($request->hasFile('avatar')){
            $validated['worker_image']=$request->file('avatar')->store("images/$request->id/avatars",'public');
        }

        $worker->update($validated);

        if(isset($request->school)){
            $school=School::where('school_name',$request->school)->first();
            $worker->schools()->attach($school->id);
        }
        if(isset($request->department)){
            $department=Department::where('department_name',$request->department)->first();
            $worker->departments()->attach($department->id);
        }

        if(isset($request->project)){
            $project=Project::where('project_name',$request->project)->first();
            $worker->projects()->attach($project->id);
        }
        if(isset($request->category)){
            $category=Category::where('category_name',$request->category)->first();
            $worker->categories()->attach($category->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker)
    {
        //
    }
}
