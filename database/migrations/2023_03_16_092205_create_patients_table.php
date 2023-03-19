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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('title', 3)->nullable();
            $table->string('first_name', 25)->nullable();
            $table->string('middle_name', 25)->nullable();
            $table->string('last_name', 25)->nullable();
            $table->string('mobile', 10)->nullable();
            $table->date('dob')->nullable();
            $table->integer('age')->default(0);
            $table->unsignedBigInteger('gender')->references('id')->on('extras');
            $table->unsignedBigInteger('marital_status')->references('id')->on('extras');
            $table->unsignedBigInteger('education')->references('id')->on('extras');
            $table->text('education_details')->nullable();
            $table->unsignedBigInteger('employment')->references('id')->on('extras');
            $table->text('employment_details')->nullable();
            $table->unsignedBigInteger('language')->references('id')->on('extras');
            $table->unsignedBigInteger('id_proof')->references('id')->on('extras');
            $table->string('id_proof_number', 25)->nullable();            
            $table->string('patient_photo', 50)->nullable();            
            $table->date('registration_date')->nullable();
            $table->unsignedBigInteger('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
