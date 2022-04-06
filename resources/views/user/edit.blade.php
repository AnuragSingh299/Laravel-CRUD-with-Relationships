@extends('layouts.app')
@section('content')
<h1 class="header" align="center">Edit user</h1>
<div class="form-control" style="width: 50%; margin: auto">
    {{ Form::model($user, ['route' => ['user.update', $user->id ]]) }}
    @csrf
    @method('PATCH')
    @include('user.form')
    
    <input type="submit" class="btn btn-success">
    <a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
    {{ Form::close() }}
</div>
@endsection