<?php
/**
* 
*/
class Leave extends Eloquent
{
	protected $table = "leaves";
	protected $fillable = array("employee_id", "starting_date", "ending_date", "is_approve");

	public function employee(){
		return $this->belongsTo("employee");
	}

	//create Method for total Approved Leaves
	public function totalApprovedLeaves(){
		$approvedLeaves = static::where("employee_id", $this->employee_id)
								->where("is_approve", 1)
								->count();

		return $approvedLeaves ? : 0;
	}


	//Create Method for Total Rejected Leave
	public function totalRejectedLeave(){
		$rejectedLeaves = static::where("employee_id", $this->employee_id)
								->where("is_approve", -1)
								->count();

		return $rejectedLeaves ? : 0;
	}


	//Create Method for Total Leaves
	public function totalLeaves(){
		$totalLeaves = static::where("employee_id", $this->employee_id)
							->count();

		return $totalLeaves ? : 0;
	}
}