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
        Schema::table('provides', function (Blueprint $table) {
            $table->string('key')->nullable()->after('provide_name_display');
        });
        Schema::table('guest', function (Blueprint $table) {
            $table->string('key')->nullable()->after('guest_name_display');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_column_provideandguest');
    }
};
