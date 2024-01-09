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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('product_qty');
            $table->unsignedBigInteger('product_price');
            $table->unsignedBigInteger('order_id');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
