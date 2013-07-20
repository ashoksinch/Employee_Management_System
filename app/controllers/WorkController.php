<?php
/**
* 
*/
class WorkController extends BaseController
{
	

	//Work index page in which all employees are display
	public function get_index(){

		$employees = Employee::all()->toArray();
		return Response::json(compact("employees"), 200);
	}


	//Create work with Employee Id
	public function get_create($id){

		$employee = Employee::find($id)->toArray();
		return Response::json(compact("employee"), 200);
	}


	//saving work of employee
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
			return Response::json(array('errors' => $validator->messages), 400);
		}

		$work = new Work();
		$work->fill($data);
		$work->save();
		return Response::json(compact("work"), 201);
	}


	//edit work with work ID
	public function get_edit($id){

		$work = Work::find($id)->toArray();
		return Response::json(compact("work"), 200);
	}


	//saving edited work
	public function post_update($id){

		$data = Input::get();
		$work = Work::find($id);
		$work->fill($data);
		$work->save();
		return Response::json(compact("work"), 201);
	}
}