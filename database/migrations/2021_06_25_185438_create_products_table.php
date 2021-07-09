<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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

            $table->integer('category_id')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->integer('price')->nullable();
            $table->string('unit')->nullable();
            $table->text('description')->nullable();
            $table->integer('stock')->nullable();
            $table->string('status')->nullable();
            $table->string('picturePath')->nullable();

            $table->softDeletes();
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
}
