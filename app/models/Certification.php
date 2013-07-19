<?php
/**
* 
*/
class Certification extends Eloquent
{
	
	protected $table = "certifications";
	protected $fillable = array("employee_id", "title", "date", "score");

	public function employee(){
		return $this->belongsTo("employee");
	}
}