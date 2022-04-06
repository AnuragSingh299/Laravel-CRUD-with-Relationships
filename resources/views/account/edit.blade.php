@extends('layouts.app')
@section('content')
<h1 class="header" align="center">Edit account</h1>
<div class="form-control" style="width: 50%; margin: auto">
    {{ Form::model($account, ['route' => ['account.update', $account->id ]]) }}
    @csrf
    @method('PATCH')
    @include('account.form')
    <input type="submit" class="btn btn-success">
    <a href="{{ route('account.index') }}" class="btn btn-warning">Back</a>
    {{ Form::close() }}
</div>
@endsection