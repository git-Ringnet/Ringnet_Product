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
        Schema::table('quoteexport', function (Blueprint $table) {
            $table->integer('product_id')->nullable();
            $table->decimal('qty_delivery', 20, 4)->nullable();
        });
        Schema::table('detailexport', function (Blueprint $table) {
            $table->dropColumn('product_id');
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
