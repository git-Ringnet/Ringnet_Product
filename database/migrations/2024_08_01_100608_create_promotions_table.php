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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('guest_id');
            $table->unsignedBigInteger('quoteE_id');
            $table->text('description')->nullable();
            $table->string('type')->nullable(); // 'cash', 'gold', 'product'
            $table->decimal('cash_value', 20, 2)->nullable();
            $table->string('gold_value', 255)->nullable();
            $table->integer('product_quantity')->nullable();
            $table->string('total')->nullable();
            $table->date('month');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
