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
        Schema::table('detailimport', function (Blueprint $table) {
            $table->decimal('total_price',20,4)->nullable();
            $table->decimal('total_tax',20,4)->nullable();
            $table->decimal('discount',20,4)->nullable();
            $table->decimal('transfer_fee',20,4)->nullable();
            $table->string('terms_pay')->nullable();
        });
        Schema::table('detailexport', function (Blueprint $table) {
            $table->decimal('total_price',20,4)->nullable();
            $table->decimal('total_tax',20,4)->nullable();
            $table->decimal('discount',20,4)->nullable();
            $table->decimal('transfer_fee',20,4)->nullable();
            $table->string('terms_pay')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_data');
    }
};
