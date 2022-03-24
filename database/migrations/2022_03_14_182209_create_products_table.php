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
            $table->foreignId('size_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('marke_id')->constrained();
            $table->string('name');
            $table->string('picture');
            $table->float('old_price')->nullable();
            $table->float('current_price');
            $table->float('percentage')->nullable();
            $table->boolean('trending')->default(0)->nullable();
            $table->boolean('statuts')->default(0)->nullable();
            $table->longText('specification')->nullable();
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
