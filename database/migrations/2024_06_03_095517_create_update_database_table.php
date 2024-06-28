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
        Schema::create('returnimport', function (Blueprint $table) {
            $table->id();
            $table->integer('receive_id')->nullable();
            $table->string('description')->nullable();
            $table->integer('workspace_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('status')->nullable();
            $table->string('return_code')->nullable();
            $table->timestamps();
        });
        Schema::create('returnproduct', function (Blueprint $table) {
            $table->id();
            $table->integer('quoteimport_id')->nullable();
            $table->decimal('qty', 20, 4)->nullable();
            $table->string('sn')->nullable();
            $table->integer('returnImport_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('returnimport');
    }
};
