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
        Schema::table('patient_labs', function (Blueprint $table) {
            $table->text('result')->after('notes')->nullable();
            $table->text('normal_range')->after('result')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patient_labs', function (Blueprint $table) {
            $table->dropColumn(['result', 'normal_range']);
        });
    }
};
