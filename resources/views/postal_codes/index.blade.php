<table class="table">
	<tr>
		<th>Postal Code</th>
		<th>Prefecture</th>
		<th>City</th>
		<th>Street</th>
	</tr>
	@foreach ($postalCodes as $postalCode)
		<tr>
			<td>{{ $postalCode->postal_code }}</td>
			<td>{{ $postalCode->prefecture }}</td>
			<td>{{ $postalCode->city }}</td>
			<td>{{ $postalCode->street }}</td>
		</tr>
	@endforeach
</table>
