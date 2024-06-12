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
        Schema::table('quoteimport', function (Blueprint $table) {
            $table->integer('reciept_id')->nullable();
            $table->integer('payorder_id')->nullable();
        });
        Schema::table('pay_order', function (Blueprint $table) {
            $table->integer('guest_id')->nullable();
            $table->integer('content_pay')->nullable();
            $table->integer('fund_id')->nullable();
            $table->integer('usercreate_id')->nullable();
            $table->integer('detailimport_id')->nullable()->change();
            $table->integer('provide_id')->nullable()->change();
            $table->string('note')->nullable();
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
