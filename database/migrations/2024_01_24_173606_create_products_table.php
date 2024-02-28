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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('quantity');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->string('sku');
            $table->string('size');
            $table->float('price')->nullable();

            $table->timestamps();
            $table->string('color')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('product_type')->nullable();
            $table->enum('condition', ['new', 'used', 'used like new'])->default('new');
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
