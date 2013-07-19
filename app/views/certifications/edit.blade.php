<h1>Edit Certification</h1>
<form method="post" action="/certifications/update/{{ $certification->id }}">
	<div>
		<label>Title</label>
		<input type="text" name="title" value="{{ $certification->title }}"/>
	</div>
	<div>
		<label>Date</label>
		<input type="text" name="date" value="{{ $certification->date }}"/>
	</div>
	<div>
		<label>Score</label>
		<input type="text" name="score" value="{{ $certification->score }}"/>
	</div>
	<div>
		<button>Update</button>
	</div>
</form>