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
        Schema::table('guest', function (Blueprint $table) {
            $table->text('guest_address')->nullable()->change();
            $table->string('guest_code')->nullable()->change();
        });
        Schema::table('provides', function (Blueprint $table) {
            $table->text('provide_address')->nullable()->change();
            $table->string('provide_code')->nullable()->change();
        });
        Schema::table('groups', function (Blueprint $table) {
            $table->string('group_code')->nullable();
        });
        //tạo bảng thủ kho
        Schema::create('warehouse_manager', function (Blueprint $table) {
            $table->id();
            $table->integer('warehouse_id');
            $table->integer('user_id');
            $table->text('name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->integer('workspace_id');
            $table->timestamps();
        });
        //
        Schema::table('detailexport', function (Blueprint $table) {
            $table->text('address_guest')->nullable();
            $table->string('note')->nullable();
            $table->string('receiver')->nullable();
            $table->string('address_delivery')->nullable();
            $table->timestamp('date_payment')->nullable();
            $table->string('phone_receive')->nullable();
            $table->timestamp('date_delivery')->nullable();
            $table->integer('id_sale')->nullable();
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
