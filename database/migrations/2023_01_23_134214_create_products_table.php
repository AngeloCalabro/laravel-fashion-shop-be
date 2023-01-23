<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('quantity')->unsigned()->nullable();
            $table->float('price', 6,2)->unsigned();
            $table->string('price_sign', 3)->nullable();
            $table->string('image_link')->nullable();
            $table->string('product_link')->nullable();
            $table->string('website_link')->nullable();
            $table->string('rating')->nullable();
            $table->foreignId('type_id')->cascadeOnUpdate()->nullOnDelete()->nullable()->constrained();
            $table->foreignId('brand_id')->cascadeOnUpdate()->nullOnDelete()->nullable()->constrained();
            $table->foreignId('texture_id')->cascadeOnUpdate()->nullOnDelete()->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
