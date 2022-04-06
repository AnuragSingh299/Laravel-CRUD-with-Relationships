@extends('layouts.app')
@section('content')
<div>
    <table class="table table-striped table-borderless">
        <tr>
            <td>Name:</td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td>Projects:</td>
            <td>
                @foreach ($user->projects as $project)
                {{$project->name}} <br>
                @endforeach
            </td>
        </tr>
    </table>
</div>
<a href="{{ route('user.index') }}" class="btn btn-primary">Back</a>
@endsection