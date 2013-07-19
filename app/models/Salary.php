<?php
/**
* 
*/
class Salary extends Eloquent
{
	
	protected $table = "salaries";
	protected $fillable = array("employee_id", "current_salary", "paid_salary", "date");

	public function employee(){

		return $this->belongTo("employee");
	}
}