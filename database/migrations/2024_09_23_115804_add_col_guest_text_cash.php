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
        //
        Schema::table('cash_receipts', function (Blueprint $table) {
            $table->text('provide_guest_name')->nullable();
        });
        //
        Schema::table('pay_order', function (Blueprint $table) {
            $table->text('provide_guest_name')->nullable();
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
