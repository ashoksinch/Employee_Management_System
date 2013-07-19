<h1>Education Edit page</h1>
<form method="post" action="/educations/update/{{ $education->id }}">
	<div>
		<label>Institute</label>
		<input type="text" name="institute" value="{{ $education->institute }}"/>
	</div>

	<div>
		<label>Place</label>
		<input type="text" name="place" value="{{ $education->place }}"/>
	</div>

	<div>
		<label>Year Of Passout</label>
		<input type="text" name="year_of_passout" value="{{ $education->year_of_passout }}"/>
	</div>

	<div>
		<label>Degree</label>
		<input type="text" name="degree" value="{{ $education->degree }}"/>
	</div>

	<div>
		<button>Update</button>
	</div>

</form>