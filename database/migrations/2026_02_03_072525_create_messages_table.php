<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            // Sender Information
            $table->morphs('sender'); // sender_type, sender_id

            // Receiver Information
            $table->morphs('receiver'); // receiver_type, receiver_id

            // Message Content
            $table->string('subject');
            $table->text('body');

            // Status Flags
            $table->boolean('is_read')->default(false);
            $table->boolean('is_starred')->default(false);
            $table->boolean('sender_deleted')->default(false);
            $table->boolean('receiver_deleted')->default(false);

            // Timestamps
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index(['receiver_type', 'receiver_id', 'is_read']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
