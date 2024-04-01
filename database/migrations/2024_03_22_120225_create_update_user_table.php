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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->nullable();
        });
        Schema::table('workspaces', function (Blueprint $table) {
            $table->string('name_company')->after('workspace_name')->nullable();
            $table->string('address_company')->after('workspace_name')->nullable();
            $table->string('mst')->after('workspace_name')->nullable();
            $table->string('name_bank')->after('workspace_name')->nullable();
            $table->string('number_bank')->after('workspace_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
