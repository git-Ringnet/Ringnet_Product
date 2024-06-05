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
        Schema::table('warehouse', function (Blueprint $table) {
            $table->string('warehouse_code')->nullable()->after('warehouse_name');
            $table->text('warehouse_address')->nullable()->after('warehouse_code');
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
