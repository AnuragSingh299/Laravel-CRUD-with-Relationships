@extends('layouts.app')
@section('content')
<div>
    <table class="table table-striped table-borderless">
        <tr>
            <td>Name:</td>
            <td>{{ $contact->name }}</td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td>{{ $contact->phone }}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{ $contact->email }}</td>
        </tr>
    </table>
</div>
<a href="{{ route('contact.index') }}" class="btn btn-primary">Back</a>
@endsection