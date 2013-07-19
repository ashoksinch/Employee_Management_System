<h1>Create Employee</h1>

<form method="post" action="/employees/create">
	<div>
		<label>First name</label>
		<input type="text" name="fname"/>
		<font color="red">{{ $errors->first("fname") }}</font>
	</div>

	<div>
		<label>Last name</label>
		<input type="text" name="lname"/>
		<font color="red">{{ $errors->first("lname") }}</font>
	</div>
	
	<div>
		<button>Save</button>
	</div>
</form>