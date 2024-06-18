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
        Schema::create('return_export', function (Blueprint $table) {
            $table->id();
            $table->integer('delivery_id')->nullable();
            $table->integer('guest_id')->nullable();
            $table->string('code_return')->nullable();
            $table->decimal('total_return', 20, 4)->nullable();
            $table->decimal('payment', 20, 4)->nullable();
            $table->string('description')->nullable();
            $table->integer('status')->nullable();
            $table->string('promotion')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('workspace_id')->nullable();
            $table->timestamps();
        });
        Schema::create('product_return_export', function (Blueprint $table) {
            $table->id();
            $table->integer('return_export_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('return_qty')->nullable();
            $table->decimal('product_total_vat', 20, 4)->nullable();
            $table->decimal('price_export', 20, 4)->nullable();
            $table->string('promotion')->nullable();
            $table->string('description')->nullable();
            $table->integer('workspace_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_export');
    }
};
