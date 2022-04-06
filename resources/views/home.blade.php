@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    {{-- <a href="{{ route('account.index') }}">Accounts</a>
                    <a href="{{ route('user.index') }}">Users</a>
                    <a href="{{ route('contact.index') }}">Contacts</a>
                    <a href="{{ route('project.index') }}">Projects</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
