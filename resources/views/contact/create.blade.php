
@extends('layouts.app')
@section('content')
<h1 class="header" align="center">Add contact</h1>
<div class="form-group" style="width: 50%; margin: auto">
	{{ Form::open(['route'=>'contact.store', 'method'=>'post']) }}
		@csrf
		@include('contact.form')
		<input type="submit" class="btn btn-success" name="submit">
		<a href="{{ route('contact.index') }}" class="btn btn-warning">Back</a>
	{{ Form::close() }}
</div>
@endsection