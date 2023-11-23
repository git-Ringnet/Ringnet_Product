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
        Schema::create('detailimport', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('provide_id');
            $table->unsignedBigInteger('project_id');
            // $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');
            $table->string('quotation_number')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('price_effect')->nullable();
            $table->integer('status');
            // $table->unsignedBigInteger('warehouse_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailimport');
    }
};
