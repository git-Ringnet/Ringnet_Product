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
        Schema::create('guest_dateform', function (Blueprint $table) {
            $table->id();
            $table->string('form_field')->nullable();
            $table->unsignedBigInteger('guest_id')->nullable();
            $table->unsignedBigInteger('date_form_id')->nullable();
            $table->timestamps();
            // $table->foreign('guest_id')->references('id')->on('guest')->onDelete('cascade');
            // $table->foreign('date_form_id')->references('id')->on('date_form')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_dateform');
    }
};
