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
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detailexport_id')->nullable();
            $table->unsignedBigInteger('delivered_id')->nullable();
            $table->unsignedBigInteger('provide_id')->nullable();
            $table->unsignedBigInteger('detailimport_id')->nullable();
            $table->unsignedBigInteger('history_import')->nullable();
            $table->string('tax_import')->nullable();
            $table->string('price_import')->nullable();
            $table->string('total_import')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};
