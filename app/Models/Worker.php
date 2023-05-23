<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Worker extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable=['worker_name',
    'worker_address','worker_phone',
    'worker_email','worker_telegram',
    'worker_description','worker_education',
    'worker_experience','worker_skills','worker_birthday',
    'worker_department','worker_image',
    'worker_car','worker_laptop','worker_avatar',
    'worker_passport_seria','worker_passport_number',
    'worker_passport_inn','worker_passport_snils',
    'worker_passport_date','worker_passport_organ','worker_passport_term','worker_passport_code'];


    public function schools(){
        return $this->belongsToMany(School::class,'worker_schools')->withTimestamps();
    }
    public function departments(){
        return $this->belongsToMany(Department::class,'worker_departments')->withTimestamps();
    }
    public function categories(){
        return $this->belongsToMany(Category::class,'worker_categories')->withTimestamps();
    }
    public function projects(){
        return $this->belongsToMany(Project::class,'worker_projects')->withTimestamps();
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function files(){
        return $this->hasMany(File::class);
    }
}
