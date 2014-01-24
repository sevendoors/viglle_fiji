<?php

use Illuminate\Database\Migrations\Migration;

class AddFilenameFilesizeToUserpicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::table('userpics',function($table){
					$table->string('filename');
					$table->string('filesize');
					$table->string('filetype');
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
