<?php

use Illuminate\Database\Migrations\Migration;

class CreateCertificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("certifications", function($table){
			$table->increments("id");
			$table->integer("employee_id");
			$table->string("title");
			$table->date("date");
			$table->integer("score");
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
		Schema::drop("certifications");
	}

}