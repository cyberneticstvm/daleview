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
        Schema::create('suds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->unique();
            $table->string('years_of_substance_use')->nullable();
            $table->string('duration_of_heavy_or_problematic_use')->nullable();
            $table->date('date_of_last_drink')->nullable();
            $table->date('date_of_last_drug_use')->nullable();
            $table->boolean('tremors')->default(0);
            $table->boolean('sleeplessness')->default(0);
            $table->boolean('suicidal_thought')->default(0);
            $table->boolean('poor_appetite')->default(0);
            $table->boolean('suicidal_thought_past_two_weeks')->default(0);
            $table->boolean('suicidal_attempt')->default(0);
            $table->boolean('suicidal_plans')->default(0);
            $table->boolean('vomiting')->default(0);
            $table->boolean('hallucinations')->default(0);
            $table->boolean('blood_vomiting')->default(0);
            $table->boolean('delusions')->default(0);
            $table->boolean('chest_burn')->default(0);
            $table->boolean('suspicion')->default(0);
            $table->boolean('hypertension')->default(0);
            $table->boolean('severe_verbal_violence')->default(0);
            $table->boolean('diabetes')->default(0);
            $table->boolean('physical_violence')->default(0);
            $table->boolean('fits')->default(0);
            $table->boolean('breaking_things')->default(0);
            $table->boolean('self_harm')->default(0);
            $table->text('other_problems')->nullable();
            $table->boolean('treatment_past_five_years')->default(0);
            $table->text('treatment_past_five_years_details')->nullable();
            $table->text('head_injury_treatment_details')->nullable();
            $table->boolean('met_psychiatrist')->default(0);
            $table->boolean('prior_treatment_addiction')->default(0);
            $table->text('prior_treatment_addiction_details')->nullable();
            $table->unsignedBigInteger('reason_given_by_client')->references('id')->on('extras')->default(0);
            $table->unsignedBigInteger('recognize_problems')->references('id')->on('extras')->default(0);
            $table->unsignedBigInteger('alter_drinking_pattern')->references('id')->on('extras')->default(0);
            $table->unsignedBigInteger('willing_to_admit')->references('id')->on('extras')->default(0);
            $table->unsignedBigInteger('room_allotted')->references('id')->on('extras')->default(0);
            $table->boolean('delirium_tremens')->default(0);
            $table->boolean('suicidal_risk')->default(0);
            $table->boolean('violence')->default(0);
            $table->boolean('cardiac_problems')->default(0);
            $table->boolean('tb')->default(0);
            $table->boolean('hiv')->default(0);
            $table->boolean('hepatitis')->default(0);
            $table->boolean('co_morbidities')->default(0);
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
        Schema::dropIfExists('suds');
    }
};
