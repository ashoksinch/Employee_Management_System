<?php
/**
* 
*/
class Employee extends Eloquent
{
	
	protected $table = "employees";
	protected $fillable = array("fname", "lname", "email", "dob", "blood_group", "gender", 
								"pan", "current_address", "permanant_address", 
								"emergency_contact");

	public function leave(){
		return $this->hasMany("leave");
	}


	public function education(){
		return $this->hasMany("education");
	}

	public function work(){
		return $this->hasMany("work");
	}

	public function certification(){
		return $this->hasMany("certification");
	}

	public function attendance(){

		return $this->hasMany("attendance");
	}

	public function salary(){

		return $this->hasMany("salary");
	}
}
?>