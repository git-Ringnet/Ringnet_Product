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
        Schema::table('quoteimport', function (Blueprint $table) {
            $table->string('promotion')->nullable();
            // $table->timestamps();
        });
        Schema::table('detailimport', function (Blueprint $table) {
            $table->string('promotion')->nullable();
            // $table->timestamps();
        });
        Schema::table('history_import', function (Blueprint $table) {
            $table->string('promotion')->nullable();
            // $table->timestamps();
        });

        Schema::table('quoteimport', function (Blueprint $table) {
            $table->dropForeign(['detailimport_id']);
            // $table->foreign('warehouse_id')->references('id')->on('detailimport');
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
