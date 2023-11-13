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
            $table->decimal('price_import', 20, 4)->nullable()->change();
        });
        Schema::table('quoteimport', function (Blueprint $table) {
            $table->decimal('price_import', 20, 4)->nullable()->change();
        });
        Schema::table('quoteexport', function (Blueprint $table) {
            $table->integer('deliver_id')->nullable();
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
