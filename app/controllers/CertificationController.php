<?php
/**
* 
*/
class CertificationController extends BaseController
{
	

	//certification index page..all employees are display	
	public function get_index(){

		$employees = Employee::all()->toArray();
		return Response::json(compact('employees'));
	}


	//Create certification form in which employee id is pass
	public function get_create($id){

		$employee = Employee::find($id)->toArray();
		return Response::json(compact("employee"));
	}


	//create certificatin of employee
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
			return Response::json(array('errors' => $validator), 400);
		}
		$certification = new Certification();
		$certification->fill($data);
		$certification->save();

		return Response::json(compact('certification'));
	}


	//Edit certification form...certification details are display in form using unique ID
	public function get_edit($id){

		$certification = Certification::find($id)->toArray();
		return Response::json(compact("certification"));
	}


	//saving edited certificaion with ID
	public function post_update($id){

		$data = Input::get();
		$certification = Certification::find($id);
		$certification->fill($data);
		$certification->save();

		return Response::json(compact('certification'));
	}
}