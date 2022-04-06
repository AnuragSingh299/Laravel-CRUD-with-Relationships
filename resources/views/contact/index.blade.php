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
                            <a href="{{ route('contact.create') }}" class="btn btn-success">Add new contact</a>
                        </div><br>
                        <table class="table table-bordered" style="background: white">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Account</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->name }}</td>
                                        <td style="white-space: nowrap">{{ $contact->phone }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>
                                            @foreach ($contact->accounts as $account)
                                                {{$account->name}} <br>
                                             @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-primary m-1">Show</a>
                                            <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-warning m-1">Edit</a>
                                            <a href="#" class="btn btn-danger m-1" onclick="document.getElementById('delete-contact-{{ $contact->id }}').submit();">Delete</a>
                                            <form method="post" action="{{ route('contact.destroy', $contact->id) }}" id="delete-contact-{{ $contact->id }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No contact found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $contacts->links() }}
                    {{-- {{ __('index page') }} --}}
                </div>
            </div>
        
    </div>
</div>
@endsection
