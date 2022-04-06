@extends('layouts.app')

@section('content')
{{-- {{ dd($projects) }} --}}
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
                            <a href="{{ route('user.create') }}" class="btn btn-success">Add new user</a>
                        </div><br>
                        <table class="table table-bordered" style="background: white">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Projects</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @foreach ($user->projects as $project)
                                                {{$project->name}} <br>
                                            @endforeach
            
                                        </td>
                                        <td>
                                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary m-1">Show</a>
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning m-1">Edit</a>
                                            <a href="#" class="btn btn-danger m-1" onclick="document.getElementById('delete-user-{{ $user->id }}').submit();">Delete</a>
                                            <form method="post" action="{{ route('user.destroy', $user->id) }}" id="delete-user-{{ $user->id }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No user found.</td>
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
