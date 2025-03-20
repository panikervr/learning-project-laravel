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
        Schema::create('shop_category', function (Blueprint $table) {
            $table->id();
            $table->string('category_name')->nullable();
            $table->timestamps();
        });
        Schema::create('shop', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('shop_category');
            $table->string('name')->nullable();
            $table->integer('price')->nullable();
            $table->string('image')->nullable();
            $table->string('rcon')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop');
    }
};
