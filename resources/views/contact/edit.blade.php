@extends('layouts.app')
@section('content')
<h1 class="header" align="center">Edit contact</h1>
<div class="form-control" style="width: 50%; margin: auto">
    {{ Form::model($contact, ['route' => ['contact.update', $contact->id ]]) }}
    @csrf
    @method('PATCH')
    @include('contact.form')
   
    <input type="submit" class="btn btn-success">
    <a href="{{ route('contact.index') }}" class="btn btn-warning">Back</a>
    {{ Form::close() }}
</div>
@endsection