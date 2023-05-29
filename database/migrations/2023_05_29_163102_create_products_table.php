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
            $table->string("name",30)->nullable(false);
            $table->string("decription",50)->nullable();
            $table->string("sku",8)->unique();
            $table->float("price")->default(0);
            $table->smallInteger("cantidad")->default(0);
            $table->unsignedBigInteger("category_id")->nullable();
            $table->boolean("status")->default(true);
            $table->dateTime("created_at")->default(now());
            $table->foreign('category_id')->references("id")->on("categories")->onDelete("set null");

           # $table->timestamps();
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
