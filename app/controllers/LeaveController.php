<?php
/**
* 
*/
class LeaveController extends BaseController
{

	
	//Leave index page all leave with employee name is display with DESC order
	public function get_index(){

		$leaves = Leave::with("employee")
						->orderBy('id','DESC')
						->get()
						->toArray();
		return Response::json(compact("leaves"), 200);
	}


	//Create Leave form of employee
	public function get_create(){

		$employees = Employee::all();
		return Response::json(compact("employees"), 200);
	}


	//saving leave of employee
	public function post_create(){

		$data = Input::get();
		$leave = new Leave();
		$leave->fill($data);
		$leave->save();
		
		$leave_mail = Leave::with("employee")->find($leave->id);
		//sending mail of created leave
		Mail::send('leaves.create_leave', array("leave_mail" => $leave_mail), function($message)use($leave_mail)
		{
    		$message->to($leave_mail->employee['email'], $leave_mail->employee['fname'])->subject('Your Leave is Successfully sent to Approval');
		});
		return Response::json(compact("leave"), 201);
	}


	//edit leave status either status is accepted or rejected
	//GET /leaves/edit/<id>/<status>
	public function get_edit($id, $status){

		$leave = Leave::with("employee")
						->find($id);
		if($status == "1")
		{
			$data['is_approve'] = $leave->is_approve = 1;
			//sending mail of accepted leave				
			Mail::send('leaves.acceptmail', array("leave" => $leave), function($message)use($leave)
			{
    			$message->to($leave->employee['email'], $leave->employee['fname'])->subject('Your Leave Accepted');
			});
		}

		if($status == "-1")
		{
			$data['is_approve'] = $leave->is_approve = -1;
			//sending mail of rejected leave				
			Mail::send('leaves.rejectmail', array("leave" => $leave), function($message)use($leave)
			{
    			$message->to($leave->employee['email'], $leave->employee['fname'])->subject('Your Leave Rejected');
			});
		}
		$leave->save($data);
		return Response::json(array(), 201);
	}


	//leave show page
	public function get_show($id){

		$leave = Leave::with("employee")->find($id)->toArray();

		$leaves = Leave::with("employee")
						->where("employee_id", $leave->employee_id)
						->get()->toArray();

		return Response::json(compact("leave", "leaves"), 200);
	}

}