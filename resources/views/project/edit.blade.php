@extends('layouts.app')
@section('content')
<h1 class="header" align="center">Edit project</h1>
<div class="form-control" style="width: 50%; margin: auto">
    {{ Form::model($project, ['route' => ['project.update', $project->id ]]) }}
    @csrf
    @method('PATCH')
    @include('project.form')
    <input type="submit" class="btn btn-success">
    <a href="{{ route('project.index') }}" class="btn btn-warning">Back</a>
    {{ Form::close() }}
</div>
@endsection