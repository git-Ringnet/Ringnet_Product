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
        Schema::table('products', function (Blueprint $table) {
            $table->integer('type')->nullable()->after('id');
        });

        Schema::table('pay_order', function (Blueprint $table) {
            $table->dateTime('payment_day')->nullable()->after('debt');
            $table->string('payment_type')->nullable()->after('payment_day');
        });

        Schema::table('pay_export', function (Blueprint $table) {
            $table->dateTime('payment_day')->nullable()->after('debt');
            $table->string('payment_type')->nullable()->after('payment_day');
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
