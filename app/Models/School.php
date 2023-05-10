<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    public function workers(){
        return $this->belongsToMany(Worker::class,'worker_schools');
    }
}
