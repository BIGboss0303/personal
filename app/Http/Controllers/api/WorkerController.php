<?php

namespace App\Http\Controllers\Api;

use App\Models\School;
use App\Models\Worker;
use App\Models\Project;
use App\Models\Category;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Resources\WorkerResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\WorkerCollection;
use App\Http\Requests\StoreWorkerRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateWorkerRequest;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $workers=Worker::all();
        $categories=Category::all();
		$workers=new WorkerCollection($workers);
        return ['categories'=>$categories,'worker'=>$workers];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        $projects=Project::all();
        $schools=School::all();
        $departments=Department::all();
        return ["categories"=>$categories,"projects"=>$projects,"schools"=>$schools,"departments"=>$departments];

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
            'worker_birthday'=>'',
            'worker_car'=>'',
            'worker_laptop'=>'',
            'worker_passport_seria'=>'',
            'worker_passport_number'=>'',
            'worker_passport_inn'=>'',
            'worker_passport_snils'=>'',
            'worker_passport_date'=>'',
            'worker_passport_organ'=>'',
            'worker_passport_term'=>'',
            'worker_passport_code'=>''

          ]);
        if ($validator->fails()){
            return $validator->errors();
        }
        $validated=$validator->valid();
        if($request->hasFile('avatar')){
            $validated['worker_avatar']=$request->file('avatar')->store("images/$request->id/avatars",'public');

        }
        $worker=Worker::create($validated);

        if(isset($request->school)){
            foreach($request->school as $school){
            $worker->schools()->attach($school);
            }
        }
        if(isset($request->department)){
            foreach($request->department as $department){
                $worker->departments()->attach($department);
            }
        }

        if(isset($request->project)){
            foreach($request->project as $project){
            $worker->projects()->attach($project);
            }
        }
        if(isset($request->category)){
            foreach ($request->category as $category){
            $worker->categories()->attach($category);
            }
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
    public function edit($workerId)
    {
        $worker= Worker::find($workerId);
        $worker= new WorkerResource($worker);
        $categories=Category::all();
        $projects=Project::all();
        $schools=School::all();
        $departments=Department::all();
        return ["worker"=>$worker,"categories"=>$categories,"projects"=>$projects,"schools"=>$schools,"departments"=>$departments];
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
            'worker_birthday'=>'',
            'worker_car'=>'',
            'worker_laptop'=>'',
            'worker_passport_seria'=>'',
            'worker_passport_number'=>'',
            'worker_passport_inn'=>'',
            'worker_passport_snils'=>'',
            'worker_passport_date'=>'',
            'worker_passport_organ'=>'',
            'worker_passport_term'=>'',
            'worker_passport_code'=>''

          ]);
          
        $validated=$validator->valid();
        if($request->hasFile('avatar')){
            $deleted=File::delete(storage_path("app/public/$worker->worker_avatar"));

            $validated['worker_avatar']=$request->file('avatar')->store("images/$request->id/avatars",'public');
        }

        $worker->update($validated);
        $worker->schools()->detach();
        $worker->projects()->detach();
        $worker->departments()->detach();
        $worker->categories()->detach();


        if(isset($request->school)){
            foreach($request->school as $school){
                $worker->schools()->attach($school);
            }
        }
        if(isset($request->department)){
            foreach($request->department as $department){
                $worker->departments()->attach($department);
            }
        }

        if(isset($request->project)){
            foreach($request->project as $project){
                $worker->projects()->attach($project);
            }
        }
        if(isset($request->category)){
            foreach ($request->category as $category){
                $worker->categories()->attach($category);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($worker)
    {
        $worker=Worker::find($worker);
        File::deleteDirectory(storage_path("app/public/images/$worker->id"));
        File::deleteDirectory(storage_path("app/public/files/$worker->id"));
        $worker->delete();
    }
}
