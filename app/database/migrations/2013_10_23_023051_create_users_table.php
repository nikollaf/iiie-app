<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('users', function($table)
        {
            $table->increments('id');
            $table->string('user_role');
            $table->string('first_name', 64);
            $table->string('last_name', 64);
            $table->string('password', 120);
            $table->string('email', 90);
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
        Schema::drop('users');
    }

}