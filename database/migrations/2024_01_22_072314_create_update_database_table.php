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
        Schema::table('represent_provide', function (Blueprint $table) {
            $table->integer('default')->nullable()->after('workspace_id');
        });
        Schema::table('history_import', function (Blueprint $table) {
            $table->integer('provide_id')->nullable()->after('version');
            $table->integer('product_id')->nullable()->after('version');
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
