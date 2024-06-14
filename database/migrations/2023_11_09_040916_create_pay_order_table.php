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
        Schema::create('pay_order', function (Blueprint $table) {
            $table->id();
            $table->integer('detailimport_id');
            $table->integer('provide_id');
            $table->integer('status');
            $table->dateTime('payment_date');
            $table->decimal('total',20,4);
            $table->decimal('payment',20,4);
            $table->decimal('debt',20,4);
            $table->integer('return_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_order');
    }
};
