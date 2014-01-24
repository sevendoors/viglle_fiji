<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserPicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
			Schema::create('userpics',function($table){
					$table->engine	=	'InnoDB';
					$table->increments('id')->unsigned();
					$table->integer('user_id')->unsigned();
					$table->string('pic_url');
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
			Shcema::drop('userpics');
		//
	}

}
