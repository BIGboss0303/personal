<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $fillable=['worker_firstname',
    'worker_middlename','worker_lastname',
    'worker_address','worker_phone',
    'worker_email','worker_telegram',
    'worker_description','worker_education',
    'worker_experience','worker_category',
    'worker_skills','worker_birthday',
    'worker_department','worker_image',
    'worker_car','worker_laptop',];

    
    public function schools(){
        return $this->belongsToMany(School::class,'worker_schools');
    }
    public function projects(){
        return $this->belongsToMany(Project::class,'worker_projects');
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function files(){
        return $this->hasMany(Files::class);
    }
}
