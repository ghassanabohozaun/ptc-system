<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_contract_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->cascadeOnDelete();
            $table->string('weekly_working_hours_and_days')->nullable();
            $table->string('holidays_and_festivals')->nullable();
            $table->longText('job_duties')->nullable();
            $table->longText('contract_terms')->nullable();
            $table->text('education_contract')->nullable();
            $table->text('experiences_contract')->nullable();
            $table->text('other_requirements')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_contract_details');
    }
};
