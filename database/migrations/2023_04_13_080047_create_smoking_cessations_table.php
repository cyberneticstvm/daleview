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
        Schema::create('smoking_cessations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->unique();
            $table->text('details_of_drug_use')->nullable();
            $table->text('what_motivate_stop_tobacco')->nullable();
            $table->unsignedBigInteger('tobacco_type')->references('id')->on('extras')->default(0);
            $table->integer('how_soon_first_cigarette_after_wakeup')->nullable();
            $table->integer('difficult_to_abstain')->nullable();
            $table->integer('cigerette_to_give_up')->nullable();
            $table->integer('cigerettes_per_day')->nullable();
            $table->integer('cigerret_smoking_frequency_day_or_morning')->nullable();
            $table->integer('cigerret_smoking_in_ill')->nullable();
            $table->text('cigerettes_pack_per_day')->nullable();
            $table->text('beedi_pack_per_day')->nullable();
            $table->text('smokless_pack_per_day')->nullable();
            $table->text('smokeless_type_and_name')->nullable();
            $table->text('other_tobacco_product')->nullable();
            $table->text('other_drug_detail')->nullable();
            $table->text('date_of_last_quit_attempt')->nullable();
            $table->text('how_long_quit_last_time')->nullable();
            $table->text('longest_period_of_quit')->nullable();
            $table->text('how_long_ago')->nullable();
            $table->text('what_caused_relapse')->nullable();
            $table->text('counselling_remarks')->nullable();           
            $table->boolean('nicotine_gum')->default(0);
            $table->boolean('nicotine_patch')->default(0);
            $table->boolean('varenicline')->default(0);
            $table->boolean('bupropion')->default(0);
            $table->boolean('nicotine_nasal_spray')->default(0);
            $table->boolean('nicotine_oral_inhaler')->default(0);
            $table->boolean('other_medication')->default(0);
            $table->boolean('no_medication')->default(0);
            $table->boolean('seizures')->default(0);
            $table->boolean('eating_disorder')->default(0);
            $table->boolean('asthma')->default(0);
            $table->boolean('psoriasis')->default(0);
            $table->boolean('cardiac_problem')->default(0);
            $table->boolean('renal_impairment')->default(0);
            $table->boolean('serious_psychiatric_illness')->default(0);
            $table->boolean('diabetic')->default(0);
            $table->boolean('irritability')->default(0);
            $table->boolean('depression')->default(0);
            $table->boolean('anxiety')->default(0);
            $table->boolean('restlessness')->default(0);
            $table->boolean('trouble_concentrating')->default(0);
            $table->boolean('insomnia')->default(0);
            $table->boolean('hunger')->default(0);
            $table->boolean('other_illness')->default(0);
            $table->date('quit_date')->nullable();
            $table->text('quit_date_call')->nullable();
            $table->date('next_follow_up_date')->nullable();
            $table->boolean('prescription')->default(0);
            $table->boolean('feedback_report_card')->default(0);
            $table->boolean('iec')->default(0);
            $table->boolean('quit_smoking_guide')->default(0);
            $table->boolean('other_docs')->default(0);
            $table->text('pharmacotherapy')->nullable();
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
        Schema::dropIfExists('smoking_cessations');
    }
};
