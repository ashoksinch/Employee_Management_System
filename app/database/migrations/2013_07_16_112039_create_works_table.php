<?php

use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("works", function($table){
			$table->increments("id");
			$table->integer("employee_id");
			$table->string("company_name");
			$table->string("company_place");
			$table->string("job_title");
			$table->date("from_date");
			$table->date("to_date");
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
		Schema::drop("works");
	}

}