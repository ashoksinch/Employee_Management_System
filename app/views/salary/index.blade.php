<h1>Salary Index Page</h1>
<table>
	<tr>
		<th>Employee Name</th>
		<th>Current Salary</th>
		<th>Paid Salary</th>
		<th>Date</th>
	</tr>

@foreach($salaries as $salary)
	<tr>
		<td>
			{{ $salary->employee['fname'] }}
			{{ $salary->employee['lname']}}
		</td>
		<td>{{ $salary->current_salary }}</td>
		<td>{{ $salary->paid_salary }}</td>
		<td>{{ $salary->date}}</td>
	</tr>
@endforeach
</table>
<h2><a href="/salary/create">Create</a></h2>