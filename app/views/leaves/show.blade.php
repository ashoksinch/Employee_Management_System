<h1>welcome to show page</h1>
<table>
<tr>
<td>
	<table border=1>
	<tr>
		<th>Name</th>
		<th>Leaves Dates</th>
		<th>Total Accepted Leaves</th>
		<th>Status</th>
	</tr>
	<tr>
		<td>
			{{ $leave->employee['fname'] }} {{ $leave->employee['lname'] }}
		</td>
		<td>
			{{ $leave->starting_date }} - {{ $leave->ending_date }}
			({{ date_diff(date_create($leave->starting_date), date_create($leave->ending_date))->format("%d Days") }})
		</td>	
		<td>
			{{ $leave->totalApprovedLeaves() }}
		</td>
		<td>
			@if($leave->is_approve==1)
				<font color='Green'>Accepted</font> | <a href="/leaves/edit/{{ $leave->id }}/-1">Reject</a>

			@elseif($leave->is_approve==-1)
				<font color='red'>Rejected</font> | <a href="/leaves/edit/{{ $leave->id }}/1">Accept</a>

			@else
				<a href="/leave/edit/{{ $leave->id }}/1">Accept</a> | 
				<a href="/leave/edit/{{ $leave->id }}/-1">Reject</a>
			@endif
		</td>
	</tr>
	</table>
</td>
<td>
	<table border=1>
		<tr>
			<th>Name</th>
			<th>Leave Dates</th>
			<th>status</th>
		</tr>
		@foreach($leaves as $leave)
			<tr>
				<td>
					{{ $leave->employee['fname'] }} {{ $leave->employee['lname'] }}
				</td>
				<td>
					{{ $leave->starting_date }} - {{ $leave->ending_date }}
					({{ date_diff(date_create($leave->starting_date), date_create($leave->ending_date))->format("%d Days") }})
				</td>
				<td>
					@if($leave->is_approve==1)
						<font color="Green">Approve</font>
					@elseif($leave->is_approve==-1)
						<font color="red">Rejected</font>
					@else
						<font color="DarkOrange">Pending</font>
					@endif
				</td>
			</tr>
		@endforeach
	</table>
</td>
</tr>
</table>
