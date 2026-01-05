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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('father_name');
            $table->string('grand_father_name');
            $table->string('family_name');
            $table->string('password')->nullable();
            $table->string('personal_id')->unique();
            $table->enum('gender', ['male', 'female']);
            $table->date('birthday')->nullable();
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed']);
            $table->string('mobile_no')->nullable();
            $table->string('alternative_mobile_no')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('governoate_id')->nullable()->constrained('governorates')->cascadeOnDelete();
            $table->foreignId('city_id')->nullable()->constrained('cities')->cascadeOnDelete();
            $table->text('address_details')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('iban')->nullable();
            $table->string('banck_account')->nullable();
            $table->decimal('basic_salary', 8, 3)->nullable()->default(0);
            $table->enum('currency', ['ILS', 'USD', 'GBP'])->default('USD');
            $table->string('photo')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
