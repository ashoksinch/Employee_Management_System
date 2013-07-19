<?php
/**
* 
*/
class EducationController extends BaseController
{
	

	public function get_index(){
		$employees = Employee::all();

		$this->layout->pageContent = View::make("educations.index")
									->with("employees", $employees);
	}


	public function get_create($id){

//		$employees = Employee::all();
		$employee = Employee::find($id);

		$this->layout->pageContent = View::make("educations.create")
									->with("employee", $employee);
	}


	public function post_create(){

		$data = Input::get();
		$rules = array('institute' => 'required',
						'place' => 'required',
						'year_of_passout' => 'required',
						'degree' => 'required'
						);

		$validator = Validator::make($data, $rules);
		$employee_id = Input::get("employee_id");

		if($validator->fails())
		{
			return Redirect::to("/educations/create/".$employee_id)->withErrors($validator);
		}

		$education = new Education();
		$education->fill($data);
		$education->save();

		//$this->layout->pageContent = View::make("educations.index");
		return Redirect::to("/employees/show/".$employee_id);
	}


	public function get_edit($id){

		$education = Education::find($id);
		$this->layout->pageContent = View::make("educations.edit")
									->with("education", $education);
	}



	public function post_update($id){

		$data = Input::get();
		$education = Education::find($id);
		$education->fill($data);
		$education->save();

		return Redirect::to("/employees/index");
	}
}
