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
            $table->string('title');
            $table->string('description');
            $table->string('page_label')->nullable();
            $table->string('page_description')->nullable();
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
