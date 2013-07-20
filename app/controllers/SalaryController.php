<?php
/**
* 
*/
class SalaryController extends BaseController
{
	

	//index page of salary in with all salary belongso with employees are display
	public function get_index(){

		$salaries = Salary::with("employee")->get();		
		$this->layout->pageContent = View::make("salary.index")
								->with("salaries", $salaries);
	}


	//create salary form
	public function get_create(){

		$employees = Employee::all();		
		$this->layout->pageContent = View::make("salary.create")
								->with("employees", $employees);
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
			return Redirect::to("/salary/create")->withErrors($validator);
		}

		$salary = new Salary();
		$salary->fill($data);
		$salary->save();
		return Redirect::to("/salary/index");
	}
}