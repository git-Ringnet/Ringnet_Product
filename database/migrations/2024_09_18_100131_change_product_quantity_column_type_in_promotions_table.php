<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('promotions', function (Blueprint $table) {
            // Sửa kiểu dữ liệu của cột product_quantity từ integer thành string
            $table->string('product_quantity')->nullable()->change();
            $table->unsignedBigInteger('quoteE_id')->default(0)->change();
            $table->integer('month')->change();
            $table->integer('year')->after('month');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promotions', function (Blueprint $table) {
            // Đảo ngược thay đổi, sửa kiểu dữ liệu trở lại integer
            $table->integer('product_quantity')->nullable()->change();
            $table->unsignedBigInteger('quoteE_id')->change();
            $table->date('month')->change();
            $table->dropColumn('year');
        });
    }
};
