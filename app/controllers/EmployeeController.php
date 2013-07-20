<?php
/**
* 
*/
class EmployeeController extends BaseController
{
	

	//index page of employeey in which all employees are display
	public function get_index(){

		$employees = Employee::all()->toArray();
		return Response::json(compact('employees'), 200);
	}


	//create employee form
	public function get_create(){

		$this->layout->pageContent = View::make("employees.create");
		
	}


	//save employee
	public function post_create(){

		$data = Input::get();
		$rules = array('fname' => 'required|alpha',
						'lname' => 'required|alpha'
						);

		$validator = Validator::make($data,$rules);

	    if ($validator->fails())
	    {
	        return Response::json(array('errors' => $validator->messages), 400);
	    }

		$employee = new Employee();
		$employee->fill($data);
		$employee->save();

		return Response::json(compact("employee"), 201);
	}


	//personal form details form
	public function get_personal(){

		$employee_id = Session::get("employee_id");
		return Response::json(compact("employee_id"), 200);
	}


	//personal details save 
	public function post_personal(){

		$data = Input::get();
		$rules = array('dob' => 'required',
						'blood_group' => 'required',
						'gender' => 'required',
						'pan' => 'required'
						);

		$employee_id = Input::get("employee_id");
		$validator = Validator::make($data, $rules);
		if($validator->fails())
		{
			return Response::json(array('errors' => $validator->messages), 400);
		}

		$employee_id = Input::get("employee_id");
		$employee = Employee::find($employee_id);
		$employee->fill($data);
		$employee->save();
		return Response::json(compact("employee"), 201);
	}


	//contact details form
	public function get_contact(){

		$employee_id = Session::get("employee_id")->toArray();
		return Response::json(compact("employee_id"), 200);
	}


	//contact detail save
	public function post_contact(){

		$data = Input::get();
		$rules = array('email' => 'required|email',
						'current_address' => 'required',
						'permanant_address' => 'required',
						'emergency_contact' => 'required'
						);
		$employee_id = Input::get("employee_id");
		$validator = Validator::make($data, $rules);
		if($validator->fails())
		{
			return Response::json(array('errors' => $validator->messages), 400);
		}

		$employee = Employee::find($employee_id);
		$employee->fill($data);
		$employee->save();
		return Response::json(compact("employee"), 201);
	}


	//employee show page with education, work, certificaion and attendance details
	public function get_show($id){

		$employee = Employee::with("education", "work", "certification", "attendance")
							->find($id);
		//dd($employee);
		return Response::json(compact("employee"), 200);
		//$this->layout->pageContent = View::make("employees.show")
		//							->with("employee", $employee);
	}


	//saving attendance
	//
	public function get_attendance($id){

		$attendance =new Attendance();
		$today_att = Attendance::where("employee_id", $id)
								->where("date", date("Y-m-d"))
								->first();

		if(!is_null($today_att) && $today_att->status == 'Present')
		{
			$today_att->id = $today_att->id;
			$today_att->status = "Absent";
			$today_att->save();
			return Response::json(compact("today_att"), 201);
		}
		elseif (!is_null($today_att) && $today_att->status == 'Absent') 
		{
			$today_att->id = $today_att->id;
			$today_att->status = "Present";
			$today_att->save();
			return Response::json(compact("today_att"), 201);			
		}
		else
		{
			$attendance->employee_id = $id;
			$attendance->date = date("Y-m-d");
			$attendance->status = "Present";
			$attendance->save();
			return Response::json(compact("attendance"), 201);
		}
	}
}