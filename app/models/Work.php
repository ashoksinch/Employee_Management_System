<?php
/**
* 
*/
class Work extends Eloquent
{
	
	protected $table = "works";
	protected $fillable = array("employee_id", "company_name", "company_place", "job_title", 
								"from_date", "to_date");

	public function employee(){
		return $this->belongsTo("employee");
	}
}