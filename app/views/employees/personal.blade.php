<h1>Add Personal details</h1>
<?php
	$employee_id = Session::get("employee_id");
?>
<form method="post" action="/employees/personal">
	<div>
		<label>Date Of Birth</label>
		<input type="text" name="dob"/>
		<font color="red">{{ $errors->first("dob") }}</font>
	</div>
	<div>
		<label>Blood group</label>
		<input type="text" name="blood_group"/>
		<font color="red">{{ $errors->first("blood_group") }}</font>
	</div>
	<div>
		<label>Gender</label>
		<input type="radio" name="gender" value="Male">Male
		<input type="radio" name="gender" value="Female">Female
		<font color="red">{{ $errors->first("gender") }}</font>
	</div>
	<div>
		<label>PAN No.</label>
		<input type="text" name="pan">
		<font color="red">{{ $errors->first("pan") }}</font>
	</div>
	<div>
		<input type="hidden" name="employee_id" value="{{ $employee_id }}"/>
	</div>
	<div>
		<button>Save</button>
	</div>
</form>