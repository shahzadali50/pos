<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_phone');
            // $table->unsignedBigInteger('item_id');
            $table->decimal('sub_total', 8, 2);
            $table->decimal('disc', 8, 2)->nullable();
            $table->decimal('grand_total', 8, 2);
            $table->decimal('paid', 8, 2)->nullable();
            $table->timestamps();
            // Foreign key relationship
            // $table->foreign('item_id')->references('id')->on('products');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
