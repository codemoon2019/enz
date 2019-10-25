<div class="col">

	<div class="float-right">
		<a href="{{ route('admin.events.export', $model->id) }}" target="_blank">
			<button class="btn btn-primary">
				<i class="fa fa-upload"></i> Export
			</button>
		</a> 
	</div>

	<br>
	<br>


	<table class="table table-hoved table-striped">

		<thead>

			<th>Firstname</th>

			<th>Lastname</th>

			<th>Contact Number</th>

			<th>Email Address</th>
			
			<th>Address</th>
			
			<th>Profession</th>

			<th>Date</th>

		</thead>

		<tbody>
			{{-- @dd($model->inquiries) --}}
			@foreach ($model->inquiries as $inquiry)

				<tr>

					<td>{{ $inquiry->first_name }}</td>

					<td>{{ $inquiry->last_name }}</td>

					<td>{{ $inquiry->contact_number }}</td>

					<td>{{ $inquiry->email_address }}</td>
					
					<td>{{ $inquiry->address }}</td>
					
					<td>{{ $inquiry->profession }}</td>

					<td>{{ $inquiry->created_at->format('M d, Y h:i') }}</td>

				</tr>

			@endforeach

		</tbody>

	</table>

</div>