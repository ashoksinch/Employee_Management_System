<?php

use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("salaries", function($table){
			$table->increments("id");
			$table->integer("employee_id");
			$table->integer("current_salary");
			$table->integer("paid_salary");
			$table->date("date");
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
		Schema::drop("salaries");
	}

}