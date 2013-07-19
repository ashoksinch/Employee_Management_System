<?php
/**
* 
*/
class SalaryController extends BaseController
{
	
	public function get_index(){

		$employees = Employee::all();
		$this->layout->pageContent = View::make("salary.index")
								->with("employees", $employees);
	}


	public function get_create(){

		$employees = Employee::all();		
		$this->layout->pageContent = View::make("salary.create")
								->with("employees", $employees);
	}


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