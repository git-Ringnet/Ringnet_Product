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
            $table->integer('group_id')->default(0)->after('guest_name');
            $table->date('birthday')->nullable()->after('group_id');
            $table->string('fax')->nullable()->after('birthday');
            $table->decimal('debt_limit', 15, 2)->nullable()->after('fax');
            $table->decimal('initial_debt', 15, 2)->nullable()->after('debt_limit');
            $table->string('price_type')->nullable()->after('initial_debt');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->integer('group_id')->default(0)->after('email');
            $table->string('user_code')->nullable()->after('group_id');
        });
    }
    /** * Reverse the migrations. */ public function down(): void
    {
        Schema::table('guest', function (Blueprint $table) {
            $table->dropColumn(['group_id', 'birthday', 'fax', 'debt_limit', 'initial_debt']);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['group_id', 'user_code']);
        });
    }
};
