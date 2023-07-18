<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Property;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id('id');
            $table->integer('direction_id')->nullable();
            $table->integer('preview_image_id')->nullable();
            $table->integer('price')->nullable();
            $table->integer('price_from')->default(0);
            $table->string('square')->nullable();
            $table->string('price_per_square')->nullable();
            $table->string('url')->nullable();
            $table->integer('for_living')->nullable();
            $table->integer('for_resale')->nullable();
            $table->integer('for_long_rent')->nullable();
            $table->integer('for_daily_rent')->nullable();
            $table->integer('page_banner_id')->nullable();

            $table->integer('status')->default(Property::STATUS_DRAFT);

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
        Schema::table('properties', function (Blueprint $table) {
            //
        });
    }
}
