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
        Schema::table('detailexport', function (Blueprint $table) {
            $table->decimal('shipping_fee', 20, 4)->default(0);
        });
        Schema::table('detailimport', function (Blueprint $table) {
            $table->decimal('shipping_fee', 20, 4)->default(0);
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
