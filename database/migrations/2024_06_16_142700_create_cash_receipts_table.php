<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_receipts', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_code');
            $table->date('date_created')->nullable();
            $table->integer('guest_id')->nullable();
            $table->string('payer')->nullable();
            $table->decimal('amount', 20, 2);
            $table->integer('content_id')->nullable();
            $table->integer('fund_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('delivery_id')->nullable();
            $table->integer('status')->default(1);
            $table->text('note')->nullable();
            $table->integer('workspace_id')->nullable();
            $table->timestamps();
        });
        Schema::table('delivery', function (Blueprint $table) {
            $table->decimal('totalVat', 20, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cash_receipts');
    }
}
