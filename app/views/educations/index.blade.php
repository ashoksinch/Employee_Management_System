<h1>welcome to education page</h1>
<table>
	<tr>
		<th>Name</th>
		<th>Add Education</th>
	</tr>
	@foreach($employees as $employee)
		<tr>
			<td>{{ $employee->fname }} {{ $employee->lname }}</td>
			<td><a href="/educations/create/{{ $employee->id }}">Add Education</a></td>
		</tr>
	@endforeach
</table>