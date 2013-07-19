<h1>Add Employees Work</h1>
<form method="post" action="/works/create">
	<div>
		<input type="hidden" name="employee_id" value="{{ $employee->id }}">
	</div>
	<div>
		<label>Company name</label>
		<input type="text" name="company_name"/>
		<font color="red">{{ $errors->first("company_name") }}</font>
	</div>
	<div>
		<label>Company Place</label>
		<input type="text" name="company_place"/>
		<font color="red">{{ $errors->first("company_place") }}</font>

	</div>
	<div>
		<label>Job Title</label>
		<input type="text" name="job_title"/>
		<font color="red">{{ $errors->first("job_title") }}</font>

	</div>
	<div>
		<label>From date</label>
		<input type="text" name="from_date">
		<font color="red">{{ $errors->first("from_date") }}</font>

	</div>
	<div>
		<label>To Date</label>
		<input type="text" name="to_date">
		<font color="red">{{ $errors->first("to_date") }}</font>

	</div>
	<div>
		<button>Save</button>
	</div>
</form>