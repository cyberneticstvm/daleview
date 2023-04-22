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
        Schema::create('doctor_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('file_id');
            $table->longText('comments')->nullable();
            $table->unsignedBigInteger('created_by')->references('id')->on('users');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('file_id')->references('id')->on('patient_files')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_comments');
    }
};
