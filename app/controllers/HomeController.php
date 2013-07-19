<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

//	public function showWelcome()
//	{
//		return View::make('hello');
//	}


	public function get_index(){

	//	$employees = Employee::all();
		//$month = date("d");
	//	$date = date("Y-m-d");
		//dd(CURDATE());
		//$employees = Employee::where(MONTH('dob'), MONTH(CURDATE()))->get();
//		$employees = Employee::where(datepart(m, dob), datepart(m, getdate()))->get();

		//$employees = DB::table("employees")
		//				->select("dob", "fname", "lname")
		//				->where("dob", "MONTH(CURDATE('%m'))")
		//				->get();

		//$employees = DB::query("Select FLOOR(datediff(CURDATE(), dob) / 365) as current_age, FLOOR(datediff(DATE_ADD(CURDATE(), interval 15 day), dob) / 365) as future_age from employees");
		/*$employees = DB::select("Select 
	FLOOR(datediff(CURDATE(), dob) / 365) as current_age,
	FLOOR(datediff(DATE_ADD(CURDATE(), interval 15 day), dob) / 365) as future_age,
	fname,
	lname
	from employees");*/


	$employees = DB::select("Select dob,fname,lname from employees where 
	FLOOR(datediff(CURDATE(), dob) / 365) != FLOOR(datediff(DATE_ADD(CURDATE(), interval 15 day), dob) / 365)
	");


//Select 
//	FLOOR(datediff(CURDATE(), dob) / 365) as current_age,
//	FLOOR(datediff(DATE_ADD(CURDATE(), interval 15 day), dob) / 365) as future_age
//from employees


	//	dd($employees);
		$this->layout->pageContent = View::make("/home/index")
									->with("employees", $employees);
	}

}