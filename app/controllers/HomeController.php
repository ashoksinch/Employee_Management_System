<?php

class HomeController extends BaseController 
{


	//upcoming birthday employee query
	public function get_index(){

		$employees = DB::select("Select dob,fname,lname from employees where 
		FLOOR(datediff(CURDATE(), dob) / 365) != FLOOR(datediff(DATE_ADD(CURDATE(), interval 15 day), dob) / 365)
		");

		return Response::json(compact("employees"));
	}

}