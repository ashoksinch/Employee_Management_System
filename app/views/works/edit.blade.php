<h1>Edit Work</h1>
<form method="post" action="/works/update/{{ $work->id }}">

	<div>
		<label>Company Name</label>
		<input type="text" name="company_name" value="{{ $work->company_name }}"/>
	</div>

	<div>
		<label>Company Place</label>
		<input type="text" name="company_place" value="{{ $work->company_place }}"/>
	</div>

	<div>
		<label>Job Title</label>
		<input type="text" name="job_title" value="{{ $work->job_title }}"/>
	</div>

	<div>
		<label>From Date</label>
		<input type="text" name="from_date" value="{{ $work->from_date }}"/>
	</div>

	<div>
		<label>To Date</label>
		<input type="text" name="to_date" value="{{ $work->to_date }}"/>
	</div>

	<div>
		<button>Update</button>
	</div>	
</form>