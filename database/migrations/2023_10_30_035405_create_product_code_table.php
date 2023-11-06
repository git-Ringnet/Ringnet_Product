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
        Schema::create('product_code', function (Blueprint $table) {
            $table->id();
            $table->string('product_code');
            $table->timestamps();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->integer('product_code')->change();
        });
        Schema::table('quoteimport', function (Blueprint $table) {
            $table->integer('product_code')->change();
        });
        Schema::table('quoteexport', function (Blueprint $table) {
            $table->integer('product_code')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_code');
    }
};
