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
        Schema::create('guest', function (Blueprint $table) {
            $table->id();
            $table->string('guest_name_display');
            $table->string('guest_name')->nullable();
            $table->string('guest_address');
            $table->string('guest_code');
            $table->string('guest_email')->nullable();
            $table->string('guest_phone')->nullable();
            $table->string('guest_receiver')->nullable();
            $table->string('guest_email_personal')->nullable();
            $table->string('guest_phone_receiver')->nullable();
            $table->decimal('guest_debt',20,4);
            $table->string('guest_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest');
    }
};
