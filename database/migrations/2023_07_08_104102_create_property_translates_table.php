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
            $table->text('title');
            $table->string('type');
            $table->text('payment_plan')->nullable();
            $table->string('completion_date')->nullable();
            $table->text('location_full')->nullable();
            $table->text('page_label')->nullable();
            $table->text('page_description')->nullable();
            $table->text('rent_out')->nullable();
            $table->text('buy_out')->nullable();
            $table->text('offer')->nullable();
            $table->text('payback')->nullable();
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
