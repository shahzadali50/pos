<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('code')->unique();
            $table->integer('quantity');
            $table->decimal('purchase_rate', 10, 2);
            $table->decimal('sale_rate', 10, 2);
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();



        });
    }
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
