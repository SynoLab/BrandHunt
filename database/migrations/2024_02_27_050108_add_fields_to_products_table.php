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
        Schema::table('products', function (Blueprint $table) {
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('color');
            $table->dropColumn('manufacturer');
            $table->dropColumn('product_type');
            $table->dropColumn('condition');
            $table->dropColumn('height');
            $table->dropColumn('weight');
        });
    }
};
