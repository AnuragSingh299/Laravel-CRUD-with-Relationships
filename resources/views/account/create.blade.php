@extends('layouts.app')
@section('content')
@yield('nav')
<h1 class="header" align="center">Add account</h1>
<div class="form-group" style="width: 50%; margin: auto">
	{{ Form::open(['route'=>'account.store', 'method'=>'post']) }}
		@csrf
		@include('account.form')
		
		<input type="submit" class="btn btn-success" name="submit">
		<a href="{{ route('account.index') }}" class="btn btn-warning">Back</a>
	{{ Form::close() }}
</div>
@endsection