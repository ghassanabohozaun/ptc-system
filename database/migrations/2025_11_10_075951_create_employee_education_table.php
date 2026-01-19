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
        Schema::create('employee_education', function (Blueprint $table) {
            $table->id();
            $table->string('educational_instituation_name')->nullable();
            $table->string('education_specialization')->nullable();
            $table->enum('education_level',['phd', 'masters', 'university','deplom', 'preparatory', 'secondary','etc'])->default('university');
            $table->string('education_year')->nullable();
            $table->string('certification')->nullable();
            $table->foreignId('employee_id')->nullable()->constrained('employees')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_education');
    }
};
