<?php
/**
* 
*/
class Attendance extends Eloquent
{
	protected $table = "attendances";
	protected $fillable = array("employee_id", "date", "status");

	public function employee(){

		return $this->belongTo("employee");
	}
}