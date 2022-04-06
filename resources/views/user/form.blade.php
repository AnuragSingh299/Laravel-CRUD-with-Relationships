{{ Form::label('name', 'Name:') }}
@php
    $textAttributer = ['name'=>'name', 'value'=>'', 'attributes'=>['class'=>'form-control', 'id'=>'name' ]]   
@endphp
@include('fields.text', ['attributes'=>$textAttributer])

@error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br>

{{ Form::label('email', 'Email:') }}
@php
    $textAttributer = ['name'=>'email', 'value'=>'', 'attributes'=>['class'=>'form-control', 'id'=>'email' ]]   
@endphp
@include('fields.text', ['attributes'=>$textAttributer])

@error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br>

@section('pass')
{{ Form::label('password', 'Password:') }}
@php
    $textAttributer = ['name'=>'password', 'value'=>'' ,'attributes'=>['class'=>'form-control', 'id'=>'password', 'type' => 'password' ]]   
@endphp
@include('fields.password', ['attributes'=>$textAttributer])

@error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br>    
@endsection
