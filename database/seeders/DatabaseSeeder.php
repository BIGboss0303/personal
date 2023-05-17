<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Department;
use App\Models\File;
use App\Models\Image;
use App\Models\School;
use App\Models\Worker;
use App\Models\Project;
use App\Models\WorkerCategory;
use App\Models\WorkerDepartment;
use App\Models\WorkerSchool;
use App\Models\WorkerProject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Worker::factory(10)->create();
        Category::factory(5)->create();

        School::factory(10)->create();
        Department::factory(10)->create();

        WorkerSchool::factory(10)->create();
        WorkerCategory::factory(10)->create();
        WorkerDepartment::factory(10)->create();



        Project::factory(10)->create();
        WorkerProject::factory(10)->create();
        Image::factory(10)->create();
        File::factory(50)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
