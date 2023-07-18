<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionFeatureTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direction_feature_translates', function (Blueprint $table) {
            $table->id();
            $table->integer('direction_feature_id');
            $table->integer('lang_id');
            $table->text('title')->nullable();
            $table->text('text')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direction_feature_translates');
    }
}
