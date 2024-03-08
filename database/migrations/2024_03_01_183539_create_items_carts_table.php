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
        Schema::create('items_carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('quantity')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_carts');
    }
};
