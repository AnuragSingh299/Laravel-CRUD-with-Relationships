@extends('layouts.app')
@section('content')
<div>
    <table class="table table-striped table-borderless">
        <tr>
            <td>Name:</td>
            <td>{{ $account->name }}</td>
        </tr>
        <tr>
            <td>Date Of Birth:</td>
            <td>{{ $account->dob }}</td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td>{{ $account->phone }}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{ $account->email }}</td>
        </tr>
        <tr>
            <td>Address:</td>
            <td>{{ $account->address }}</td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td>{{ $account->gender }}</td>
        </tr>
        <tr>
            <td>Country:</td>
            <td>{{ $account->country }}</td>
        </tr>
        <tr>
            <td>Contacts:</td>
            <td>
                @foreach ($account->contacts as $contact)
                    {{$contact->name}} <br>
                @endforeach
            </td>
        </tr>
    </table>
</div>
<a href="{{ route('account.index') }}" class="btn btn-primary">Back</a>
@endsection