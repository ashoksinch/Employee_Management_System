<?php

use Illuminate\Database\Migrations\Migration;

class CreateAttandancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("attendances", function($table){
			$table->increments("id");
			$table->integer("employee_id");
			$table->date("date");
			$table->string("status");
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
		Schema::drop("attendances");
	}

}