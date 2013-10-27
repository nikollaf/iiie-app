<?php

use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('blogs', function($table)
        {
            $table->increments('id');
            $table->string('title', 120);
            $table->text('content');
            $table->string('blog_post_status');
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('created_at');
            $table->date('updated_at');
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
        Schema::drop('blogs');
    }


}