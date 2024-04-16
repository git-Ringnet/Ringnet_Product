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
        Schema::table('history_payment_order', function (Blueprint $table) {
            $table->integer('payment_type')->nullable()->after('workspace_id');
        });
        Schema::table('history_payment_export', function (Blueprint $table) {
            $table->integer('payment_type')->nullable()->after('workspace_id');
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
