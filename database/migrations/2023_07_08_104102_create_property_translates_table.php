<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_translates', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id');
            $table->integer('lang_id');
            $table->string('title');
            $table->string('type');
            $table->string('payment_plan')->nullable();
            $table->string('completion_date')->nullable();
            $table->string('location_full')->nullable();
            $table->string('page_label')->nullable();
            $table->string('page_description')->nullable();
            $table->string('rent_out')->nullable();
            $table->string('buy_out')->nullable();
            $table->string('offer')->nullable();
            $table->string('payback')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_translates');
    }
}
