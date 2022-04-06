{{ Form::label('name', 'Name:') }}
@php
    $textAttributer = ['name'=>'name', 'value'=>'', 'attributes'=>['class'=>'form-control', 'id'=>'name' ]]   
@endphp
@include('fields.text', ['attributes'=>$textAttributer])

@error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br>

{{ Form::label('dob', 'Date Of Birth:') }}
@php
    $textAttributer = ['name'=>'dob', 'value'=>'', 'attributes'=>['class'=>'form-control', 'id'=>'dob']]   
@endphp
@include('fields.date', ['attributes'=>$textAttributer])

@error('dob')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br>
{{ Form::label('phone', 'Phone:') }}
@php
    $textAttributer = ['name'=>'phone', 'value'=>'', 'attributes'=>['class'=>'form-control', 'id'=>'phone']]   
@endphp
@include('fields.tel', ['attributes'=>$textAttributer])

@error('phone_no')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br>
{{ Form::label('email', 'Email:') }}
@php
    $textAttributer = ['name'=>'email', 'value'=>'', 'attributes'=>['class'=>'form-control', 'id'=>'email']]   
@endphp
@include('fields.email', ['attributes'=>$textAttributer])

@error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br>

{{ Form::label('address', 'Address:') }}
@php
    $textAttributer = ['name'=>'address', 'value'=>'', 'attributes'=>['class'=>'form-control', 'id'=>'address']]   
@endphp
@include('fields.textarea', ['attributes'=>$textAttributer])

@error('address')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br>

{{ Form::label('gender', 'Gender:') }}
@php
    $textAttributer = ['name'=>'gender', 'value'=>'', 'attributes'=>['class'=>'form-control', 'id'=>'gender']]   
@endphp
@include('fields.radio', ['attributes'=>$textAttributer])

@error('gender')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br>
{{ Form::label('country', 'Country:') }}
@php
    $selectAttributer = ['name'=>'country', 'value'=>'', 
    'options'=>['India' => 'India','Japan'=>'Japan','Germany'=>'Germany','France'=>'France'],//try at config file
    'attributes'=>['class'=>'form-control', 'id'=>'country']];
@endphp
@include('fields.select', ['attributes'=>$selectAttributer])

@error('country')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br>
