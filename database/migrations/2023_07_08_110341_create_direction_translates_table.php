<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direction_translates', function (Blueprint $table) {
            $table->id();
            $table->integer('direction_id');
            $table->integer('lang_id');
            $table->text('title');
            $table->text('description');
            $table->text('page_label')->nullable();
            $table->text('page_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direction_translates');
    }
}
