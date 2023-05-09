<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    public function schools(){
        return $this->belongsToMany(School::class,'worker_schools');
    }
    public function projects(){
        return $this->belongsToMany(Project::class,'project_schools');
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function files(){
        return $this->hasMany(Files::class);
    }
}
