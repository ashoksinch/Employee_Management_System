<?php
/**
* 
*/
class LeaveController extends BaseController
{

	

	public function get_index(){

		$leaves = Leave::with("employee")
						->orderBy('id','DESC')
						->get();

	//	dd($leaves);
		$this->layout->pageContent = View::make("leaves.index")
										->with("leaves", $leaves);
	}

	public function get_create(){

		$employees = Employee::all();
		//dd($employees);
		$this->layout->pageContent = View::make("leaves.create")
									->with("employees", $employees);
	}


	public function post_create(){

		$data = Input::get();
		$leave = new Leave();
		$leave->fill($data);
		$leave->save();

	//	$employee = Employee::where("id", Input::get('employee_id'))->get();
		
		$leave_mail = Leave::with("employee")->find($leave->id);

	//	dd($employee);
		Mail::send('leaves.create_leave', array("leave_mail" => $leave_mail), function($message)use($leave_mail)
		{
    		$message->to($leave_mail->employee['email'], $leave_mail->employee['fname'])->subject('Your Leave is Successfully sent to Approval');
		});

		return Redirect::to("/leaves/create");
	}

	public function get_edit($id, $status){

		$leave = Leave::with("employee")
						->find($id);

	//	dd($leave);
		if($status == "1")
		{
			$data['is_approve'] = $leave->is_approve = 1;
			Mail::send('leaves.acceptmail', array("leave" => $leave), function($message)use($leave)
			{
    			$message->to($leave->employee['email'], $leave->employee['fname'])->subject('Your Leave Accepted');
			});

		}

		if($status == "-1")
		{
			$data['is_approve'] = $leave->is_approve = -1;
			Mail::send('leaves.rejectmail', array("leave" => $leave), function($message)use($leave)
			{
    			$message->to($leave->employee['email'], $leave->employee['fname'])->subject('Your Leave Rejected');
			});

		}
		$leave->save($data);
		return Redirect::to("/leaves/index");
	}

	public function get_show($id){

		$leave = Leave::with("employee")->find($id);

		$leaves = Leave::with("employee")
						->where("employee_id", $leave->employee_id)
						->get();

		$this->layout->pageContent = View::make("leaves.show")
									->with("leave", $leave)
									->with("leaves", $leaves);
	}

}
?>