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
        // Schema::create('update_database', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // }

        Schema::table('warehouse', function (Blueprint $table) {
            $table->string('warehouse_address')->nullable();
            $table->string('warehouse_code')->nullable();
        });


        Schema::create('contenttype', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
        Schema::create('contentgroups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('contenttype_id')->nullable();
            $table->text('description')->nullable();
            $table->integer('workspace_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });


        Schema::table('provides', function (Blueprint $table) {
            $table->decimal('quota_debt', 20, 4)->nullable()->after('provide_phone');
            $table->integer('groups_id')->nullable()->after('provide_phone');
            $table->string('provide_fax')->nullable()->after('provide_phone');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price_retail', 20, 4)->nullable()->after('user_id');
            $table->decimal('price_wholesale', 20, 4)->nullable()->after('user_id');
            $table->decimal('price_specialsale', 20, 4)->nullable()->after('user_id');
            $table->decimal('product_weight', 20, 4)->nullable()->after('user_id');
            $table->integer('group_id')->default(0)->after('user_id');
        });

        Schema::create('content-import-export', function (Blueprint $table) {
            $table->id();
            $table->string('document')->nullable();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('content');
            $table->decimal('qty_money', 20, 4)->nullable();
            $table->integer('fund_id');
            $table->string('fund_name')->nullable();
            $table->string('notes')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('workspace_id')->nullable();
            $table->timestamps();
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
