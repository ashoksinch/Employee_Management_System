<h3>Hello, {{ $leave_mail->employee['fname'] }} {{ $leave_mail->employee['lname'] }} </h3>
<p>
	Your Leave is Successfully Added From {{$leave_mail->starting_date}} To {{ $leave_mail->ending_date }} 
	and sent to Approval plase check Leave Status
</p>