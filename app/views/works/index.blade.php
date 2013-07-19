<h1>welcome to Work page</h1>
<table>
	<tr>
		<th>Name</th>
		<th>Add Work</th>
	</tr>
	@foreach($employees as $employee)
		<tr>
			<td>{{ $employee->fname }} {{ $employee->lname }}</td>
			<td><a href="/works/create/{{ $employee->id }}">Add Work</a></td>
		</tr>
	@endforeach
</table>