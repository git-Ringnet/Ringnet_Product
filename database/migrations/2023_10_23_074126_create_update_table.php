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
        // Schema::table('detailimport', function (Blueprint $table) {
        //     $table->foreign('warehouse_id')->references('id')->on('warehouse');
        // });


        Schema::table('detailimport', function (Blueprint $table) {
            $table->foreign('provide_id')->references('id')->on('provides');
        });
        Schema::table('detailimport', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('project');
        });
        // Schema::table('detailimport', function (Blueprint $table) {
        //     $table->foreign('product_id')->references('id')->on('products');
        // });
        Schema::table('detailimport', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });


        Schema::table('quoteimport', function (Blueprint $table) {
            $table->foreign('detailimport_id')->references('id')->on('detailimport');
            // $table->foreign('warehouse_id')->references('id')->on('detailimport');
        });
        // Schema::table('quoteimport', function (Blueprint $table) {
        //     $table->foreign('product_id')->references('id')->on('products');
        // });

        Schema::table('quoteexport', function (Blueprint $table) {
            $table->foreign('detailexport_id')->references('id')->on('detailexport');
        });
        // Schema::table('quoteexport', function (Blueprint $table) {
        //     $table->foreign('product_id')->references('id')->on('products');
        // });


        Schema::table('detailexport', function (Blueprint $table) {
            $table->foreign('guest_id')->references('id')->on('guest');
        });
        Schema::table('detailexport', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('project');
        });
        // Schema::table('detailexport', function (Blueprint $table) {
        //     $table->foreign('product_id')->references('id')->on('products');
        // });
        Schema::table('detailexport', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_name', function (Blueprint $table) {
            //
        });
    }
};
