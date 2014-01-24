<?php

use Illuminate\Database\Migrations\Migration;

class AddCityTelephoneIntroAvatarToUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::table('users',function($table){
			$table->string('city');
			$table->integer('telephone');
			$table->string('intro');
			$table->string('avatar');
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
	}

}
