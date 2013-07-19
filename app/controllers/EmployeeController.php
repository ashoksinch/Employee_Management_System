<?php
/**
* 
*/
class EmployeeController extends BaseController
{
	
	//index page of employee
	public function get_index(){

		$employees = Employee::all();
		$this->layout->pageContent = View::make("employees.index")
									->with("employees", $employees);
	}


	//create employee
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
	        return Redirect::to("/employees/create")->withErrors($validator);
	    }

		$employee = new Employee();
		$employee->fill($data);
		$employee->save();

		return Redirect::to("/employees/personal")
						->with("employee_id", $employee->id);
	}



	//personal form details form
	public function get_personal(){
		$employee_id = Session::get("employee_id");
		$this->layout->pageContent = View::make("employees.personal")
									->with("employee_id", $employee_id);

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
			return Redirect::to("/employees/personal")
							->withErrors($validator)
							->with("employee_id", $employee_id);
		}

		$employee_id = Input::get("employee_id");

		$employee = Employee::find($employee_id);
		$employee->fill($data);
		$employee->save();

		return Redirect::to("employees/contact")
						->with("employee_id", $employee_id);
	}



	//contact details form
	public function get_contact(){

		$employee_id = Session::get("employee_id");
		$this->layout->pageContent = View::make("employees.contact")
								->with("employee_id", $employee_id);
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
		if($validator->fails()){
			return Redirect::to("/employees/contact")
								->withErrors($validator)
								->with("employee_id", $employee_id);;
		}

		$employee = Employee::find($employee_id);
		$employee->fill($data);
		$employee->save();
//		$this->layout->pageContent = View::make("employees.index");
		return Redirect::to("/employees/index");
	}


	public function get_show($id){

		$employee = Employee::with("education", "work", "certification", "attendance")
							->find($id);
		$this->layout->pageContent = View::make("employees.show")
									->with("employee", $employee);
	}



	public function get_attendance($id){

		$attendance =new Attendance();
		$today_att = Attendance::where("employee_id", $id)
								->where("date", date("Y-m-d"))
								->first();
	//	dd($today_att);
		//if employee is present then update to absent
		if(!is_null($today_att) && $today_att->status == 'Present')
		{
			$today_att->id = $today_att->id;
			$today_att->status = "Absent";
			$today_att->save();
			return Redirect::to("/employees/index");
		}
		//if employee is absent then updated to present
		elseif (!is_null($today_att) && $today_att->status == 'Absent') 
		{
			$today_att->id = $today_att->id;
			$today_att->status = "Present";
			$today_att->save();
			return Redirect::to("/employees/index");			
		}
		else
		{
			$attendance->employee_id = $id;
			$attendance->date = date("Y-m-d");
			$attendance->status = "Present";
			$attendance->save();
			return Redirect::to("/employees/index");
		}
	}
}