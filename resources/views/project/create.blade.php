@extends('layouts.app')
@section('content')
<h1 class="header" align="center">Add project</h1>
<div class="form-group" style="width: 50%; margin: auto">
	{{ Form::open(['route'=>'project.store', 'method'=>'post']) }}
		@csrf
		@include('project.form')
		
		<input type="submit" class="btn btn-success" name="submit">
		<a href="{{ route('project.index') }}" class="btn btn-warning">Back</a>
	{{ Form::close() }}
</div>
@endsection