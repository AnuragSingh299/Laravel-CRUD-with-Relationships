@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        
            <div >
                {{-- <div class="card-header">{{ __('Index') }}</div> --}}
                
                <div >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div >
                       
                        <div >
                            <a href="{{ route('project.create') }}" class="btn btn-success">Add new project</a>
                        </div><br>
                        <table class="table table-bordered" style="background: white">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Users</th>
                                    <th scope="col">Account</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $project)
                                    <tr>
                                        <td>{{ $project->name }}</td>
                                        <td style="white-space: nowrap">{{ $project->type }}</td>
                                        <td>{{ $project->duration }}</td>
                                        <td>
                                            @foreach ($project->users as $user)
                                                {{$user->name}} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($project->account as $account)
                                                {{$account->name}} <br>
                                            @endforeach
                                        </td>
                                        
                                        <td>
                                            <a href="{{ route('project.show', $project->id) }}" class="btn btn-primary m-1">Show</a>
                                            <a href="{{ route('project.edit', $project->id) }}" class="btn btn-warning m-1">Edit</a>
                                            <a href="#" class="btn btn-danger m-1" onclick="document.getElementById('delete-project-{{ $project->id }}').submit();">Delete</a>
                                            <form method="post" action="{{ route('project.destroy', $project->id) }}" id="delete-project-{{ $project->id }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No project found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- {{ __('index page') }} --}}
                </div>
            </div>
        
    </div>
</div>
@endsection
