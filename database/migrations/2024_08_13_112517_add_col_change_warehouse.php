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
        Schema::table('change_warehouse', function (Blueprint $table) {
            $table->integer('change_warehouse_code')->nullable();
            $table->integer('manager_warehouse')->nullable();
            $table->integer('type_change_warehouse')->nullable();
            //xóa cột
            $table->dropColumn('quoteImport_id');
            $table->dropColumn('product_name');
            $table->dropColumn('product_id');
            $table->dropColumn('qty');
            $table->dropColumn('sn');
        });
        Schema::create('product_change_warehouse', function (Blueprint $table) {
            $table->id();
            $table->integer('id_change_warehouse')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_unit')->nullable();
            $table->integer('qty')->nullable();
            $table->text('note')->nullable();
            $table->integer('workspace_id')->nullable();
            $table->timestamps();
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
