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
        Schema::create('funds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('amount', 20, 2)->default(0);
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_holder')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('tax_code')->nullable();
            $table->string('fax')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funds_and_update_user');
    }
};
