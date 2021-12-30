<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBestsellerProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bestseller_products', function (Blueprint $table) {
            $table->foreignId('bestsellers_id')
                ->constrained()
                ->nullOnDelete()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('products_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bestseller_products');
    }
}
