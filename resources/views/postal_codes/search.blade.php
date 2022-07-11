@php
@endphp

@extends('layouts.application')
@section('title', '郵便番号検索')

@section('content')
<nav>
	<ol>
		<li><a href="/postal_codes/">郵便番号一覧</a></li>
		<li><a href="/postal_codes/search/">検索</a></li>
	</ol>
</nav>

<fieldset>
	<form action="" method="get" class="" id="postal_code_form" data-turbo-frame="postal_code_index">
		<legend>検索</legend>
		<input type="input" name="postal_code" value="{{ request()->get('postal_code') }}" onInput="this.form.requestSubmit()" id="hello">

		<input type="submit" value="絞り込み" class="btn btn-primary" />
	</form>
</fieldset>
<turbo-frame id="postal_code_index">
	@if (count($postalCodes) > 0)
		<table class="table">
			<tr>
				<th>Postal Code</th>
				<th>Prefecture</th>
				<th>City</th>
				<th>Street</th>
			</tr>
			@foreach ($postalCodes as $postalCode)
				<tr>
					<td>{{ $postalCode->formattedPostalCode() }}</td>
					<td>{{ $postalCode->prefecture }}</td>
					<td>{{ $postalCode->city }}</td>
					<td>{{ $postalCode->street }}</td>
				</tr>
			@endforeach
		</table>
	@else
		該当する郵便番号がありません。入力内容をご確認ください。
	@endif
</turbo-frame>
@endsection
