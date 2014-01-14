<?php

use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('tickets',function($table){
					$table->increments('id');
					$table->string('departure');
					$table->string('departure_time');
					$table->string('destination_time');
					$table->string('departure_airport');
					$table->string('destination_airport');
					$table->string('flight_num');
					$table->string('discount');
					$table->string('discount_price');
					$table->string('economy_price');
					$table->string('first_price');
					$table->timestamps();
			});
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('tickets');
	}

}
