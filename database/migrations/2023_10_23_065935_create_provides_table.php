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
        Schema::create('provides', function (Blueprint $table) {
            $table->id();
            $table->string('provide_name_display');
            $table->string('provide_name')->nullable();
            $table->string('provide_address');
            $table->string('provide_code');
            $table->string('provide_represent')->nullable();
            $table->string('provide_email')->nullable();
            $table->string('provide_phone')->nullable();
            $table->decimal('provide_debt');
            $table->string('provide_address_delivery')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provides');
    }
};
