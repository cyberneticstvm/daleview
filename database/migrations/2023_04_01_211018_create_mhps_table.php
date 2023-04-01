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
        Schema::create('mhps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->unique();
            $table->boolean('suicidal_thought')->default(0);
            $table->boolean('suicidal_attempt')->default(0);
            $table->boolean('suicidal_thought_past_two_weeks')->default(0);
            $table->boolean('suicidal_plans')->default(0);
            $table->boolean('hallucinations')->default(0);
            $table->boolean('delusions')->default(0);
            $table->boolean('suspicion')->default(0);
            $table->boolean('severe_verbal_violence')->default(0);
            $table->boolean('physical_violence')->default(0);
            $table->boolean('breaking_things')->default(0);
            $table->text('other_problems')->nullable();
            $table->boolean('treatment_past_five_years')->default(0);
            $table->text('treatment_past_five_years_details')->nullable();
            $table->text('head_injury_treatment_details')->nullable();
            $table->boolean('met_psychiatrist')->default(0);
            $table->boolean('prior_treatment_addiction')->default(0);
            $table->text('prior_treatment_addiction_details')->nullable();
            $table->unsignedBigInteger('willing_to_admit')->references('id')->on('extras')->default(0);
            $table->longText('consulting_remarks')->nullable();
            $table->unsignedBigInteger('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->references('id')->on('users');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mhps');
    }
};
