<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogArticleTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_article_translates', function (Blueprint $table) {
            $table->id();
            $table->integer('blog_article_id');
            $table->integer('lang_id');
            $table->string('title');
            $table->text('description');

            $table->string('page_title')->nullable();
            $table->string('page_description')->nullable();

            $table->string('page_options_title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_article_translates');
    }
}
