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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('variant_name');
            $table->unsignedBigInteger('size_id')->nullable();
            $table->string('variant_color')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('image');
            $table->integer('stock')->default(0);
            $table->timestamps();

            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('set null');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
