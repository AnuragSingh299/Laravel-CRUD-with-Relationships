@extends('layouts.app')
@section('content')
<div>
    <table class="table table-striped table-borderless">
        <tr>
            <td>Name:</td>
            <td>{{ $project->name }}</td>
        </tr>
        <tr>
            <td>Type:</td>
            <td>{{ $project->type }}</td>
        </tr>
        <tr>
            <td>Duration:</td>
            <td>{{ $project->duration }}</td>
        </tr>
        <tr>
            <td>Users:</td>
            <td>
                @foreach ($project->users as $user)
                    {{$user->name}} <br>
                @endforeach
            </td>
        </tr>
        
    </table>
</div>
<a href="{{ route('project.index') }}" class="btn btn-primary">Back</a>
@endsection