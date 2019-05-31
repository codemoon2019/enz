<div class="col">

	<table class="table table-hoved table-striped">

		<thead>

			<th>Firstname</th>

			<th>Lastname</th>

			<th>Contact Number</th>

			<th>Date</th>

		</thead>

		<tbody>

			@foreach ($model->inquiries as $inquiry)

				<tr>

					<td>{{ $inquiry->first_name }}</td>

					<td>{{ $inquiry->last_name }}</td>

					<td>{{ $inquiry->contact_number }}</td>

					<td>{{ $inquiry->created_at->format('M d, Y h:i') }}</td>

				</tr>

			@endforeach

		</tbody>

	</table>

</div>