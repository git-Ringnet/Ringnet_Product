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
        Schema::table('detailimport', function (Blueprint $table) {
            $table->string('provide_name')->nullable()->after('workspace_id');
            $table->string('represent_name')->nullable()->after('provide_name');
        });

        Schema::table('detailexport', function (Blueprint $table) {
            $table->string('guest_name')->nullable()->after('workspace_id');
            $table->string('represent_name')->nullable()->after('guest_name');
        });

        // Schema::table('receive_bill', function (Blueprint $table) {
        //     $table->string('provide_name')->nullable()->after('workspace_id');
        // });

        // Schema::table('reciept', function (Blueprint $table) {
        //     $table->string('provide_name')->nullable()->after('workspace_id');
        // });

        // Schema::table('pay_order', function (Blueprint $table) {
        //     $table->string('provide_name')->nullable()->after('workspace_id');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_database');
    }
};
