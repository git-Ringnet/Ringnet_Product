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
        Schema::create('quoteexport', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detailexport_id');
            $table->string('product_code')->nullable();
            $table->string('product_name');
            $table->string('product_unit');
            $table->decimal('product_qty', 20, 4);
            $table->integer('product_tax');
            $table->decimal('product_total', 20, 4);
            $table->decimal('price_export', 20, 4);
            $table->integer('product_ratio')->nullable();
            $table->decimal('price_import')->nullable();
            $table->string('product_note')->nullable();
            // $table->unsignedBigInteger('product_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quoteexport');
    }
};
