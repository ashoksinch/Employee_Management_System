<?php

use Illuminate\Database\Migrations\Migration;

class AddColumnsEmployees extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("employees", function($table){
			$table->string("dob");
			$table->string("blood_group");
			$table->string("gender");
			$table->string("pan");
			$table->text("current_address");
			$table->text("permanant_address");
			$table->string("emergency_contact");
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table("employees", function($table){
			$table->dropColumn("dob");
			$table->dropColumn("blood_group");
			$table->dropColumn("gender");
			$table->dropColumn("pan");
			$table->dropColumn("current_address");
			$table->dropColumn("permanant_address");
			$table->dropColumn("emergency_contact");
		});
	}

}