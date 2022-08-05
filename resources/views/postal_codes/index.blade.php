@php
use \App\Helpers\PrefectureHelper;
use App\Models\PostalCode;
@endphp

@extends('layouts.application')
@section('title', '郵便番号一覧')

@section('content')
<nav>
	<ol>
		<li><a href="/postal_codes/">郵便番号一覧</a></li>
		<li><a href="/postal_codes/search">検索</a></li>
	</ol>
</nav>
<fieldset>
	<form action="" method="get" class="" onChange="this.requestSubmit()">
		<legend>絞り込み</legend>
		<select name="prefecture" id="prefecture-select">
			<option {{ request()->get('prefecture') ? '' : 'selected' }}></option>
			@foreach (PostalCode::prefectures() as $prefecture)
				@php
					$selected = ($prefecture == request()->get('prefecture'));
				@endphp
				<option value="{{ $prefecture }}"
						{{ $selected ? 'selected' : '' }}>
					{{ $prefecture }}
				</option>
			@endforeach
		</select>

		<input type="hidden" value="{{ request()->get('type') }}">

		<div class="btn-group" role="group" aria-label="Basic example">
		  <a href={{ buttonUrl('') }} class="btn btn-secondary {{ buttonActive('') }}" >
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
