<h1>Welcome to Home Page</h1>
<h2>Upcoming Birthdays</h2>
<table>
@foreach($employees as $employee)
	<tr>
		<td>
			<h3>{{ $employee->fname }} {{ $employee->lname }}</h3>
				
		</td>
	</tr>
@endforeach
</table>