<h1>Create Certification</h1>

<form method="post" action="/certifications/create">
	<div>
		<input type="hidden" name="employee_id" value="{{ $employee->id }}">
	</div>

	<div>
		<label>Title</label>
		<input type="text" name="title"/>
		<font color="red">{{ $errors->first("title") }}</font>
	</div>
	
	<div>
		<label>Date</label>
		<input type="text" name="date"/>
		<font color="red">{{ $errors->first("date") }}</font>
	</div>

	<div>
		<label>Score</label>
		<input type="text" name="score"/>
		<font color="red">{{ $errors->first("score") }}</font>
	</div>

	<div>
		<button>Save</button>
	</div>

</form>