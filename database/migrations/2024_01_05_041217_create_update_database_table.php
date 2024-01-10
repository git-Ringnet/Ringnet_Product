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
            $table->integer('represent_id')->nullable()->after('quotation_number');
        });
        Schema::table('detailexport', function (Blueprint $table) {
            $table->integer('represent_id')->nullable()->after('quotation_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_database');
    }
};
