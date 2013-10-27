<?php

use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('events', function($table)
        {
            $table->increments('event_id');
            $table->string('event_title');
            $table->string('event_status');

            $table->string('event_info');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('address');
            $table->date('zipcode');
            $table->date('state');
            $table->date('city');

            $table->int('event_url');
            $table->int('start_time');
            $table->int('end_time');
            $table->int('start_date');
            $table->int('end_date');

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
        Schema::drop('events');
	}

}