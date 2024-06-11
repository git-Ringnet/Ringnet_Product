<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('change_inventory', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('product_name')->nullable();
    //         $table->integer('product_id')->nullable();
    //         $table->integer('status')->nullable(); // Trạng thái thêm hoặc giảm
    //         $table->decimal('qty', 20, 4)->nullable(); // Số lượng
    //         $table->integer('warehouse_id')->nullable(); // Kho hàng
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    
    // public function down(): void
    // {
    //     Schema::dropIfExists('change_inventory');
    // }
};
