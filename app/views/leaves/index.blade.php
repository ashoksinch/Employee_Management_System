<h1>all leave are display here</h1>

<table border=1>

<tr>
	<th>Employee Name</th>
	<th>Leaves</th>
	<th>Total Accepted Leaves</th>
	<th>Status</th>
</tr>
@foreach($leaves as $leave)
<tr>
	<td>{{ $leave->employee['fname'] }} {{ $leave->employee['lname'] }}</td>
	<td>
		{{ $leave->starting_date }} - {{ $leave->ending_date }} 
		({{ date_diff( date_create($leave->starting_date), date_create($leave->ending_date))->format('%d Days') }})

	</td>
	<td>
		{{ $leave->totalApprovedLeaves() }}
	</td>
	<td>
		@if($leave->is_approve==1)
			<font color='Green'>Accepted</font> | <a href="/leaves/show/{{ $leave->id }}">View Details</a>

		@elseif($leave->is_approve==-1)
			<font color='red'>Rejected</font> | <a href="/leaves/show/{{ $leave->id }}">View Details</a>

		@else
			<a href="/leaves/show/{{ $leave->id }}">View Details</a>
		@endif
	</td>
</tr>

@endforeach

</table>

<h3><a href="/leaves/create">Create Leave</a></h3>