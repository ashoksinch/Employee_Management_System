<h1>Add Contact Details</h1>
<form method="post" action="/employees/contact">
	<div>
		<label>Email ID</label>
		<input type="text" name="email"/>
		<font color="red">{{ $errors->first("email") }}</font>
	</div>
	<div>
		<label>Current Address</label>
		<textarea name="current_address"></textarea>
		<font color="red">{{ $errors->first("current_address") }}</font>
	</div>
	<div>
		<label>Permanant Address</label>
		<textarea name="permanant_address"></textarea>
		<font color="red">{{ $errors->first("permanant_address") }}</font>
	</div>
	<div>
		<label>Emergency Contact</label>
		<input type="text" name="emergency_contact"/>
		<font color="red">{{ $errors->first("emergenct_contact") }}</font>
	</div>
	<div>
		<input type="hidden" name="employee_id" value="{{ $employee_id }}"/>
	</div>
	<div>
		<button>Save</button>
	</div>
</form>