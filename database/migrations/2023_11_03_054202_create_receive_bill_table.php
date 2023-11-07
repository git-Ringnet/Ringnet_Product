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
        Schema::create('receive_bill', function (Blueprint $table) {
            $table->id();
            $table->integer('detailimport_id');
            $table->string('quotation_number');
            $table->integer('provide_id');
            $table->string('shipping_unit')->nullable();
            $table->decimal('delivery_charges',20,4)->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receive_bill');
    }
};
