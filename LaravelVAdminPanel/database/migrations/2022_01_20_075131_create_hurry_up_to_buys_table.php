<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHurryUpToBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hurry_up_to_buys', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->smallInteger('gift_count')->nullable();
            $table->string('button_title')->nullable();
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
        Schema::dropIfExists('hurry_up_to_buys');
    }
}
