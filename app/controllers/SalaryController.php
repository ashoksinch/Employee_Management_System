<?php
/**
* 
*/
class SalaryController extends BaseController
{
	

	//index page of salary in with all salary belongso with employees are display
	public function get_index(){

		$salaries = Salary::with("employee")->get()->toArray();		
	//	$this->layout->pageContent = View::make("salary.index")
	//							->with("salaries", $salaries);

		return Response::json(compact("salaries"), 200);
	}


	//create salary form
	public function get_create(){

		$employees = Employee::all()->toArray();		
//		$this->layout->pageContent = View::make("salary.create")
//								->with("employees", $employees);
		return Response::json(compact("employees"), 200);
	}


	//saving salary to database
	public function post_create(){

		$data = Input::get();
		$rules = array('current_salary' => 'required|integer',
						'paid_salary' => 'required|integer',
						'date' => 'required'
						);
		$validator = Validator::make($data, $rules);
		if($validator->fails())
		{
		//	return Redirect::to("/salary/create")->withErrors($validator);
			return Response::json(array("errors" => $validator), 400);
		}

		$salary = new Salary();
		$salary->fill($data);
		$salary->save();
//		return Redirect::to("/salary/index");
		return Response::json(compact("salary"), 201);
	}
}