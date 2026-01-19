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
        Schema::create('employee_job_details', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->date('appointment_date')->nullable();
            $table->date('contact_expire_date')->nullable();
            $table->enum('employment_type', ['full_time', 'part_time', 'contract']);
            $table->string('supervisor')->nullable();
            $table->boolean('submit_monthly_report')->default(0);
            $table->foreignId('department_id')->nullable()->constrained('departments')->cascadeOnDelete();
            $table->foreignId('employee_status_id')->nullable()->constrained('employee_statuses')->cascadeOnDelete();
            $table->foreignId('employee_id')->constrained('employees')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_job_details');
    }
};
