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
        Schema::create('serialnumber', function (Blueprint $table) {
            $table->id();
            $table->string('serinumber');
            $table->integer('receive_id');
            $table->integer('detailimport_id');
            $table->integer('detailexport_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->integer('status');
            // $table->foreign('detailimport_id')->references('id')->on('detailimport');
            // $table->foreign('detailexport_id')->references('id')->on('detailexport');
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serialnumber');
    }
};
