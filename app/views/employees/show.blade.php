<h1>{{ $employee->fname }} {{ $employee->lname }}</h1>
@foreach($employee->attendance as $attendance)
	@if($attendance->status=='Present' && $attendance->date==date("Y-m-d"))
		<h2>
			<font color="green">Present</font> |
			<a href="/employees/attendance/{{ $employee->id }}">
				<font color="red">Absent</font>
			</a>
		</h2>
	@elseif($attendance->status=='Absent' && $attendance->date==date("Y-m-d"))
		<h2>
			<font color="red">Absent</font> |
			<a href="/employees/attendance/{{ $employee->id }}">
				<font color="green">Present</font>
			</a>
		</h2>
	@else
		<h2><a href="/employees/attendance/{{ $employee->id }}">Add Attendance</a></h2>
	@endif
@endforeach

<table>
	<tr>
		<th colspan=2>Personal Details</th>
	</tr>
	<tr>
		<td>Date Of Birth</td><td> {{ $employee->dob }}</td>
	</tr>
	<tr>
		<td>Blood Group</td><td>{{ $employee->blood_group }}</td>
	</tr>
	<tr>
		<td>Gender</td><td>{{ $employee->gender }}</td>
	</tr>
	<tr>
		<td>Pan No.</td><td>{{ $employee->pan }}</td>
	</tr>
</table>

<table>
	<tr>
		<th colspan=2>Contact Details</th>
	</tr>
	<tr>
		<td>
			Current Address</td><td> {{ $employee->current_address }}
		</td>
	</tr>
	<tr>
		<td>
			Email</td><td> {{ $employee->email }}
		</td>
	</tr>
	<tr>
		<td>
			Permanant Address</td><td> {{ $employee->permanant_address }}
		</td>
	</tr>
	<tr>
		<td>
			Emergency Contact</td><td> {{ $employee->emergency_contact }}
		</td>
	</tr>
</table>

<br>
@if(count($employee->education)==0)
	No Education Details Added
	<a href="/educations/create/{{ $employee->id }}/">Add Education</a>
@else
<table>
<tr>
	<th colspan=2>Education Details</th>
	<td><a href="/educations/create/{{ $employee->id }}/">Add Education</a></td>
</tr>
	@foreach($employee->education as $education)
		<tr>
			<td>Institute</td><td> {{ $education->institute }}</td>
		</tr>
		<tr>
			<td>Place</td><td> {{ $education->place }}</td>
		</tr>
		<tr>
			<td>Year Of Passout</td><td> {{ $education->year_of_passout }}</td>
		</tr>
		<tr>
			<td>Degree</td><td> {{ $education->degree }}</td>
		</tr>
		<tr>
			<td colspan=2><a href="/educations/edit/{{ $education->id }}">Edit Education</a></td>
		</tr>
		<tr>
			<td colspan=2><hr></td>
		</tr>
	@endforeach
</table>
@endif


<br>

@if(count($employee->work)==0)
	Work Details Not Added
	<a href="/works/create/{{ $employee->id }}">Add Work</a>
@else
<table>
	<tr>
		<th colspan=2>Work Details</th>
		<td><a href="/works/create/{{ $employee->id }}">Add Work</a></td>
	</tr>
	@foreach($employee->work as $work)
		<tr>
			<td>Company Name</td><td>{{ $work->company_name }}</td>
		</tr>
		<tr>
			<td>Company Place</td><td>{{ $work->company_place }}</td>
		</tr>
		<tr>
			<td>Job Title</td><td>{{ $work->job_title }}</td>
		</tr>
		<tr>
			<td>From Date</td><td>{{ $work->from_date }}</td>
		</tr>
		<tr>
			<td>To Date</td><td>{{ $work->to_date }}</td>
		</tr>
		<tr>
			<td><a href="/works/edit/{{ $work->id }}">Edit Work</a></td>
		</tr>
		<tr><td colspan=2><hr></td></tr>
	@endforeach
</table>
@endif
<br>

@if(count($employee->certification)==0)
	No certification Added
	<a href="/certifications/create/{{ $employee->id }}">Add Certification</a>
@else
	<table>
		<tr>
			<th colspan=2>Certification details</th>
			<td><a href="/certifications/create/{{ $employee->id }}">Add Certification</a></td>
		</tr>
		@foreach($employee->certification as $certification)
			<tr>
				<td>Title</td>
				<td>{{ $certification->title }}</td>
			</tr>
			<tr>
				<td>Date</td>
				<td>{{ $certification->date }}</td>
			</tr>
			<tr>
				<td>Score</td>
				<td>{{ $certification->score }}</td>
			</tr>
			<tr>
				<td><a href="/certifications/edit/{{ $certification->id }}">Edit Certification</a></td>
			</tr>
			<tr>
				<td colspan=2><hr></td>
			</tr>
		@endforeach
	</table>
@endif