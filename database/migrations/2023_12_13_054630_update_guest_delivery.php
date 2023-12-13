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
        Schema::table('represent_guest', function (Blueprint $table) {
            $table->string('represent_email')->nullable()->change();
            $table->string('represent_phone')->nullable()->change();
            $table->string('represent_address')->nullable()->change();
        });
        //
        Schema::table('represent_provide', function (Blueprint $table) {
            $table->string('represent_email')->nullable()->change();
            $table->string('represent_phone')->nullable()->change();
            $table->string('represent_address')->nullable()->change();
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
