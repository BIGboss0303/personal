<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('worker_firstname');
            $table->string('worker_middlename');
            $table->string('worker_lastname');
            $table->string('worker_address');
            $table->string('worker_phone');
            $table->string('worker_email')->nullable();
            $table->string('worker_telegram')->nullable();
            $table->string('worker_description')->nullable();
            $table->string('worker_education')->nullable();
            $table->string('worker_experience')->nullable();
            $table->string('worker_category')->nullable();

            $table->string('worker_skills')->nullable();
            $table->string('worker_birthday')->nullable();
            $table->string('worker_department')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
