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
        Schema::table('patient_files', function (Blueprint $table) {
            $table->unsignedBigInteger('referred_by')->after('patient_id')->references('id')->on('extras');
            $table->text('referral_person_details')->after('referred_by')->nullable();
            $table->string('referral_person_mobile', 10)->after('referral_person_details')->nullable();
            $table->string('referral_person_email', 50)->after('referral_person_mobile')->nullable();
            $table->string('accompanying_person', 50)->after('referral_person_email')->nullable();
            $table->string('relation_to_patient', 50)->after('accompanying_person')->nullable();
            $table->string('accompanying_person_mobile', 10)->after('relation_to_patient')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patient_files', function (Blueprint $table) {
            $table->dropColumn(['referred_by', 'referral_person_details', 'referral_person_mobile', 'referral_person_email', 'accompanying_person', 'relation_to_patient', 'accompanying_person_mobile']);
        });
    }
};
