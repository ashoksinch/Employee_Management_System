<?php

use Illuminate\Database\Migrations\Migration;

class CreateEducationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("educations", function($table){
			$table->increments("id");
			$table->integer("employee_id");
			$table->string("institute");
			$table->string("place");
			$table->string("year_of_passout");
			$table->string("degree");
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
		Schema::drop("educations");
	}

}