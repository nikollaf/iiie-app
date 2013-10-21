<?php

use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('resources', function($table)
        {
            $table->increments('id');
            $table->string('resource_title');
            $table->string('resource_url');
            $table->string('level');
            $table->date('created_at');
            $table->date('updated_at');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('resources');
    }
}