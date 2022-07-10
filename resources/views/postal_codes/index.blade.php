@php
function selectedPrefecture()
{
	return request()->get('prefecture');
}

function buttonUrl($name)
{
	return "?prefecture=" . selectedPrefecture() . "&type=" . $name;
}

function buttonActive($name)
{
	return ($name == request()->get('type')) ? 'active' : '' ;
}
@endphp

@extends('layouts.application')
@section('title', '郵便番号一覧')

@section('content')
<fieldset>
	<form action="" method="get" class="" onChange="this.submit()">
		<legend>絞り込み</legend>
		<select name="prefecture" id="prefecture-select">
			@foreach ($prefectures as $prefecture)
				<option value="{{ $prefecture }}"
						{{ $prefecture == selectedPrefecture() ? 'selected' : '' }}>
					{{ $prefecture }}
				</option>
			@endforeach
		</select>

		<input type="hidden" value="{{ request()->get('type') }}">

		<div class="btn-group" role="group" aria-label="Basic example">
		  <a href={{ buttonUrl('') }} class="btn btn-secondary {{ buttonActive('') }}">
		  	すべて
		  </a>
		  <a href={{ buttonUrl('duplicate') }} class="btn btn-secondary {{ buttonActive('duplicate') }}">
		  	二重
		  </a>
		</div>

		<input type="submit" value="絞り込み" class="btn btn-primary" />
	</form>
</fieldset>
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

{{ $postalCodes->links() }}

@endsection
