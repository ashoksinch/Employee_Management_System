<h1>Create Leave Here</h1>
<form method="post" action="/leaves/create">
	<div>
		<label>Employee</label>
		<select name="employee_id">
		@foreach($employees as $employee)
			<option value="{{ $employee->id }}">{{$employee->fname}} {{$employee->lname}}</option>
		@endforeach
		</select>
	</div>

	<div>
		<label>From Date</label>
		<input type="text" name="stating_date"/>
	</div>
	<div>
		<label>To Date</label>
		<input type="text" name="ending_date"/>
	</div> 

	<div>
		<button>Submit</button>
	</div>

</form>