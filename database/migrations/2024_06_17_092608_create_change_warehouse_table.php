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
        Schema::create('change_warehouse', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->integer('quoteImport_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->decimal('qty', 20, 4)->nullable();
            $table->integer('from_warehouse')->nullable();
            $table->integer('to_warehouse')->nullable();
            $table->string('note')->nullable();
            $table->integer('workspace_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('sn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('change_warehouse');
    }
};
