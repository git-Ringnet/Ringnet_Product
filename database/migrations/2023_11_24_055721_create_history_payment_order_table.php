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
        Schema::create('history_payment_order', function (Blueprint $table) {
            $table->id();
            $table->integer('payment_id');
            $table->decimal('total');
            $table->decimal('payment');
            $table->decimal('debt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_payment_order');
    }
};
