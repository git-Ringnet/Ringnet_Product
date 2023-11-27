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
        Schema::create('history_payment_export', function (Blueprint $table) {
            $table->id();
            $table->integer('pay_id');
            $table->decimal('total', 20, 4)->nullable();
            $table->decimal('payment', 20, 4)->nullable();
            $table->decimal('debt', 20, 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
