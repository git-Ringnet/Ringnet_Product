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
            $table->string('promotion')->nullable();
        });
        Schema::table('detailexport', function (Blueprint $table) {
            $table->string('promotion')->nullable();
            $table->string('promotion_total_product')->nullable();
        });
        Schema::table('delivery', function (Blueprint $table) {
            $table->string('promotion')->nullable();
        });
        Schema::table('delivered', function (Blueprint $table) {
            $table->string('promotion')->nullable();
        });
        Schema::table('quoteexport', function (Blueprint $table) {
            $table->dropForeign(['detailexport_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quoteexport', function (Blueprint $table) {
            //
        });
    }
};
