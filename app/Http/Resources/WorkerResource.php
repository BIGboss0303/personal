<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'worker_name'=>$this->worker_name,
            'worker_address'=>$this->worker_address,
            'worker_phone'=>$this->worker_phone,
            'worker_email'=>$this->worker_email,
            'worker_telegram'=>$this->worker_telegram,
            'worker_description'=>$this->worker_description,
            'worker_education'=>$this->worker_education,
            'worker_experience'=>$this->worker_experience,
            'worker_skills'=>$this->worker_skills,
            'worker_avatar'=>$this->worker_avatar,
            'worker_birthday'=>$this->worker_birthday,
            'worker_car'=>$this->worker_car,
            'worker_laptop'=>$this->worker_laptop,
            'worker_passport_seria'=>$this->worker_passport_seria,
            'worker_passport_number'=>$this->worker_passport_number,
            'worker_passport_inn'=>$this->worker_passport_inn,
            'worker_passport_snils'=>$this->worker_passport_snils,
            'worker_passport_date'=>$this->worker_passport_date,
            'worker_passport_organ'=>$this->worker_passport_organ,
            'worker_passport_term'=>$this->worker_passport_term,
            'worker_passport_code'=>$this->worker_passport_code,
            'worker_schools'=>$this->schools,
            'worker_projects'=>$this->projects,
            'worker_categories'=>$this->categories,
            'worker_departments'=>$this->departments,
            'worker_images'=>$this->images,
            'worker_files'=>$this->files,


        ];
    }

}
