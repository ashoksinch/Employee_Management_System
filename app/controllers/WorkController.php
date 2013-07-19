<?php
/**
* 
*/
class WorkController extends BaseController
{
	
	public function get_index(){
		$employees = Employee::all();
		
		$this->layout->pageContent = View::make("works.index")
									->with("employees", $employees);
	}


	public function get_create($id){

	//	$employees = Employee::all();
		$employee = Employee::find($id);
		$this->layout->pageContent = View::make("works.create")
									->with("employee", $employee);
	}


	public function post_create(){

		$data = Input::get();
		$rules = array('company_name' => 'required',
						'company_place' => 'required',
						'job_title' => 'required',
						'from_date' => 'required',
						'to_date' => 'required'
						);

		$validator = Validator::make($data, $rules);
		$employee_id = Input::get("employee_id");

		if($validator->fails())
		{
			return Redirect::to("/works/create/".$employee_id)->withErrors($validator);
		}

		$work = new Work();
		$work->fill($data);
		$work->save();

	//	$this->layout->pageContent = View::make("works.index");
		return Redirect::to("/employees/show/".$employee_id);
	}


	public function get_edit($id){

		$work = Work::find($id);
		$this->layout->pageContent = View::make("works.edit")
									->with("work", $work);
	}



	public function post_update($id){

		$data = Input::get();
		$work = Work::find($id);
		$work->fill($data);
		$work->save();

//		$this->layout->pageContent = View::make("/employees/show/".$work->employee_id."");
		return Redirect::to("/employees/index");
	}
}