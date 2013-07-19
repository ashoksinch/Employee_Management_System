<h1>Create Salary</h1>
<form method="post" action="/salary/create">
	<div>
		<label>Employee name</label>
		<select name="employee_id">
			@foreach($employees as $employee)
				<option value="{{ $employee->id }}">
					{{ $employee->fname }} {{ $employee->lname }}
				</option>
			@endforeach
		</select>
	</div>
	
	<div>
		<label>Current Salary</label>
		<input type="text" name="current_salary"/>
		<font color="red">{{ $errors->first("current_salary") }}</font>
	</div>

	<div>
		<label>Paid Salary</label>
		<input type="text" name="paid_salary"/>
		<font color="red">{{ $errors->first("paid_salary") }}</font>
	</div>

	<div>
		<label>Date</label>
		<input type="text" name="date"/>
		<font color="red">{{ $errors->first("date") }}</font>	
	</div>

	<div>
		<button>Save</button>
	</div>
</form>