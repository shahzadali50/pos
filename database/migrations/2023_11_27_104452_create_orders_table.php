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
            $table->string('c_name');
            $table->string('phone');
            $table->unsignedBigInteger('item_id');
            $table->string('code')->nullable();
            $table->integer('qty')->nullable();
            $table->decimal('sale_rate', 8, 2)->nullable();
            $table->timestamps();
            // Foreign key relationship
            $table->foreign('item_id')->references('id')->on('products');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
