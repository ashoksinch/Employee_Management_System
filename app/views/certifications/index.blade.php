<h1>Welcome to Certification Index Page</h1>
<table>
	<tr>
		<th>Employee Name</th>
	</tr>
	@foreach($employees as $employee)
		<tr>
			<td>{{ $employee->fname }} {{ $employee->lname }}</td>
			<td><a href="/certifications/create/{{ $employee->id }}">Add certification</a></td>
		</tr>
	@endforeach
</table>
