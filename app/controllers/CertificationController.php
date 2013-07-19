<?php
/**
* 
*/
class CertificationController extends BaseController
{
	
		
	public function get_index(){

		$employees = Employee::all();
		$this->layout->pageContent = View::make("certifications.index")
									->with("employees", $employees);
	}


	public function get_create($id){

		$employee = Employee::find($id);
		$this->layout->pageContent = View::make("certifications.create")
									->with("employee", $employee);
	}


	public function post_create(){

		$data = Input::get();
		$rules = array('title' => 'required',
						'date' => 'required',
						'score' => 'required'
						);

		$validator = Validator::make($data, $rules);
		$employee_id = Input::get("employee_id");
		if($validator->fails())
		{
			return Redirect::to("/certifications/create/".$employee_id)->withErrors($validator);
		}
		$certification = new Certification();
		$certification->fill($data);
		$certification->save();

		return Redirect::to("/employees/show/".$employee_id);
	}


	public function get_edit($id){

		$certification = Certification::find($id);
		$this->layout->pageContent = View::make("certifications.edit")
									->with("certification", $certification);
	}


	public function post_update($id){

		$data = Input::get();
		$certification = Certification::find($id);
		$certification->fill($data);
		$certification->save();

		return Redirect::to("/employees/index");
	}
}