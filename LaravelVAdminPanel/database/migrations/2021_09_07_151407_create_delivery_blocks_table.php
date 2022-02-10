<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_blocks', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('title_type_pay')->nullable();
            $table->string('title_type_delivery')->nullable();
            $table->string('title_place_delivery')->nullable();
            $table->string('title_day_delivery')->nullable();
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
        Schema::dropIfExists('delivery_blocks');
    }
}
