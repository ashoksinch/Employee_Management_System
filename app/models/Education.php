<?php
/**
* 
*/
class Education extends Eloquent
{
	protected $table = "educations";

	protected $fillable = array("employee_id", "institute", "place", "year_of_passout", "degree");

	public function employee(){
		return $this->belongsTo("employee");
	}
}
