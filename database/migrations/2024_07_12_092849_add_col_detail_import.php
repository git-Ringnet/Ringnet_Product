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
            $table->text('address')->nullable();
            $table->string('note')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('date_delivery')->nullable();
            $table->integer('id_sale')->nullable();
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
