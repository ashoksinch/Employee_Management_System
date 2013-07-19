<?php

use Illuminate\Database\Migrations\Migration;

class CreateAddleaveTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("leaves", function($table){
			$table->increments("id");
			$table->integer("employee_id");
			$table->date("stating_date");
			$table->date("ending_date");
			$table->integer("is_approve");
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
		Schema::drop("leaves");
	}

}