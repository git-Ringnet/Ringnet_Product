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
        Schema::create('represent_provide', function (Blueprint $table) {
            $table->id();
            $table->integer('provide_id');
            $table->string('represent_name');
            $table->string('represent_email');
            $table->string('represent_phone');
            $table->string('represent_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('represent_provide');
    }
};
