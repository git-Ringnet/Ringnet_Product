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
        Schema::table('receive_bill', function (Blueprint $table) {
            $table->integer('manager_warehouse')->nullable();
            $table->string('fullname')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('note_receive')->nullable();
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
