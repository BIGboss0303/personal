<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Worker extends Model
{
    use HasFactory;
    protected $fillable=['worker_name',
    'worker_address','worker_phone',
    'worker_email','worker_telegram',
    'worker_description','worker_education',
    'worker_experience',
    'worker_skills','worker_birthday',
    'worker_department','worker_image',
    'worker_car','worker_laptop',];


    public function schools(){
        return $this->belongsToMany(School::class,'worker_schools');
    }
    public function departments(){
        return $this->belongsToMany(Department::class,'worker_departments');
    }
    public function categories(){
        return $this->belongsToMany(Category::class,'worker_categories');
    }
    public function projects(){
        return $this->belongsToMany(Project::class,'worker_projects');
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function files(){
        return $this->hasMany(File::class);
    }
}
