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
        Schema::create('reciept', function (Blueprint $table) {
            $table->id();
            $table->integer('detailimport_id');
            $table->integer('provide_id');
            $table->integer('status');
            $table->decimal('price_total',20,4);
            $table->dateTime('date_bill');
            $table->string('number_bill');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reciept');
    }
};
