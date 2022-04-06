@extends('layouts.app')
@section('content')
<h1 class="header" align="center">Add user</h1>
<div class="form-group" style="width: 50%; margin: auto">
	{{ Form::open(['route'=>'user.store', 'method'=>'post']) }}
		@csrf
		@include('user.form')
		@yield('pass')
		<input type="submit" class="btn btn-success" name="submit">
		<a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
	{{ Form::close() }}
</div>
@endsection
