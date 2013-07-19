<h1>welcome to create page</h1>
<form method="post" action="/educations/create">
	<div>
		<input type="hidden" name="employee_id" value="{{ $employee->id }}">
	</div>

	<div>
		<label>Institute</label>
		<input type="text" name="institute"/>
		<font color="red">{{ $errors->first("institute") }}</font>
	</div>

	<div>
		<label>Place</label>
		<input type="text" name="place"/>
		<font color="red">{{ $errors->first("place") }}</font>
	</div>

	<div>
		<label>Year Of Passout</label>
		<input type="text" name="year_of_passout"/>
		<font color="red">{{ $errors->first("year_of_passout") }}</font>
	</div>

	<div>
		<label>Degree</label>
		<input type="text" name="degree"/>
		<font color="red">{{ $errors->first("degree") }}</font>
	</div>
	<div>
		<button>Save</button>
	</div>
</form>