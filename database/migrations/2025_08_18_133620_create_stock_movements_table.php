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
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->integer('product_variant_id');
            $table->integer('warehouse_id');
            $table->enum('movement_type', ['IN', 'OUT', 'ADJUSTMENT']);
            $table->integer('quantity');
            $table->string('reference_type', 50)->nullable(); // e.g. 'PURCHASE', 'SALE'
            $table->unsignedBigInteger('reference_id')->nullable(); // id dari transaksi terkait
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
