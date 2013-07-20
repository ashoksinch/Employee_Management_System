<?php
/**
* 
*/
class EducationController extends BaseController
{
	

	//Education Index file in which all employees are display
	public function get_index(){
		
		$employees = Employee::all()->toArray();
		return Response::json(compact("employees"), 200);
	}


	//create education form with employee ID
	public function get_create($id){

		$employee = Employee::find($id)->toArray();
		return Response::json(compact("employee"), 200);
	}


	//Saving education details of Employee
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
			return Response::json(array('errors' => $validator->messages), 400);
		}

		$education = new Education();
		$education->fill($data);
		$education->save();
		return Response::json(compact("education"), 201);
	}


	//education edit with Education ID
	public function get_edit($id){

		$education = Education::find($id)->toArray();
		return Response::json(compact("education"), 200);
	}


	//saving edited education data
	public function post_update($id){

		$data = Input::get();
		$education = Education::find($id);
		$education->fill($data);
		$education->save();
		return Response::json(compact("education"), 201);
	}
}
