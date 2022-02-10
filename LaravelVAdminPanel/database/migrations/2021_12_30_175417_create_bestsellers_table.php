<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBestsellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bestsellers', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('all_text_title')->nullable();
            $table->string('all_text_link')->nullable();
            $table->boolean('draft')->default(false);
            $table->boolean('slider_block')->default(true);
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
        Schema::dropIfExists('bestsellers');
    }
}
