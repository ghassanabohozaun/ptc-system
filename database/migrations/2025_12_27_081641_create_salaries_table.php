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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->string('year');
            $table->text('details')->nullable();
            $table->longText('notes')->nullable();
            $table->boolean('status')->default(0);
            $table->foreignId('admin_id')->constrained('admins')->cascadeOnDelete();
            $table->date('release_date');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
