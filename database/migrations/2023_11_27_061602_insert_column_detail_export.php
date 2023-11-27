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
            $table->string('goods')->nullable(); //hàng hóa
            $table->string('delivery')->nullable(); //giao hàng
            $table->string('location')->nullable(); //địa điểm
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
