<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_sites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->text('header_text')->nullable();
            $table->string('work_time')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('text_under_email')->nullable();
            $table->string('title_above_number')->nullable();
            $table->string('subtitle_above_number')->nullable();
            $table->text('left_text_block')->nullable();
            $table->text('right_text_block')->nullable();
            $table->string('copyright')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_sites');
    }
}
