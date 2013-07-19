<h1>welcome to Employees Home Page</h1>

<table>
	<tr>
		<th>Employee name</th>
		<th>Show Details</th>
	</tr>
	@foreach($employees as $employee)
	<tr>
		<td>
			{{ $employee->fname }} {{ $employee->lname }}
		</td>
		<td>
			<a href="/employees/show/{{ $employee->id }}">See Details</a>
		</td>
	</tr>	
	@endforeach
</table>

<h2><a href="/employees/create">Create Employee</a></h2>