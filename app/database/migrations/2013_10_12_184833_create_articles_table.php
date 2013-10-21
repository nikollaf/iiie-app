<?php

use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('articles', function($table)
        {
            $table->increments('id');
            $table->string('article_title');
            $table->string('article_info');
            $table->string('article_url');
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }

}