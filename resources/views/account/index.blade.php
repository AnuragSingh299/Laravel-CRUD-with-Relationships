@extends('layouts.app')
@include('sweetalert::alert')
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
                            <a href="{{ route('account.create') }}" class="btn btn-success">Add new account</a>
                        </div><br>
                        <table class="table table-bordered" style="background: white">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    {{-- <th scope="col">DOB</th> --}}
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    {{-- <th scope="col">Address</th> --}}
                                    <th scope="col">Gender</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Contacts</th>
                                    <th scope="col">Projects</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($accounts as $account)
                                    <tr>
                                        <td>{{ $account->name }}</td>
                                        {{-- <td style="white-space: nowrap">{{ $account->dob }}</td> --}}
                                        <td>{{ $account->phone }}</td>
                                        <td>{{ $account->email }}</td>
                                        {{-- <td>{{ $account->address }}</td>     --}}
                                        <td>{{ $account->gender }}</td>
                                        <td>{{ $account->country }}</td>
                                        <td>
                                            @foreach ($account->contacts as $contact)
                                                {{$contact->name}} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($account->projects as $project)
                                                {{$project->name}} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('account.show', $account->id) }}" class="btn btn-primary m-1">Show</a>
                                            <a href="{{ route('account.edit', $account->id) }}" class="btn btn-warning m-1">Edit</a>
                                            <a href="#" class="btn btn-danger m-1" onclick="document.getElementById('delete-account-{{ $account->id }}').submit();">Delete</a>
                                            <form method="post" action="{{ route('account.destroy', $account->id) }}" id="delete-account-{{ $account->id }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No account found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $accounts->links() }}
                    {{-- {{ __('index page') }} --}}
                </div>
            </div>
        
    </div>
</div>
@endsection
