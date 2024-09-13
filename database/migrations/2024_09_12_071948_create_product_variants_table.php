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
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('variant_name'); // E.g., Size, Color
            $table->string('size'); // E.g., Small, Medium, Large 
            $table->string('variant_color'); // E.g., Green, Purple
            $table->decimal('price', 8, 2); // Price for this variant
            $table->integer('stock'); // Stock for this variant
            $table->string('image')->nullable(); // Image for the variant
            $table->timestamps();
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
