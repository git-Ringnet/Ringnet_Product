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
        Schema::create('pay_export', function (Blueprint $table) {
            $table->id();
            $table->integer('detailexport_id');
            $table->integer('billSale_id');
            $table->integer('guest_id');
            $table->date('payment_date');
            $table->decimal('total', 20, 4);
            $table->decimal('payment', 20, 4);
            $table->decimal('debt', 20, 4);
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_export');
    }
};
