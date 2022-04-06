{{ Form::label('name', 'Name:') }}
@php
    $textAttributer = ['name'=>'name', 'value'=>'', 'attributes'=>['class'=>'form-control', 'id'=>'name' ]]   
@endphp
@include('fields.text', ['attributes'=>$textAttributer])

@error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br>

{{ Form::label('type', 'Type:') }}
@php
    $textAttributer = ['name'=>'type', 'value'=>'', 'attributes'=>['class'=>'form-control', 'id'=>'type' ]]   
@endphp
@include('fields.text', ['attributes'=>$textAttributer])

@error('type')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br>

{{ Form::label('duration', 'Duration:') }}
@php
    $textAttributer = ['name'=>'duration', 'value'=>'', 'attributes'=>['class'=>'form-control', 'id'=>'duration' ]]   
@endphp
@include('fields.text', ['attributes'=>$textAttributer])

@error('duration')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br>

{{ Form::label('accounts', 'Account:') }}
@php
    $account = DB::table('accounts')->whereNull('deleted_at')->pluck('name','id');
    // dump($account);
    $selectAttributer = ['name'=>'account_id', 'value'=>'',  
    'options'=>[ $account ],                                    
    'attributes'=>['class'=>'form-select', 'id'=>'account']];
@endphp
@include('fields.select', ['attributes'=>$selectAttributer])
<br>

{{ Form::label('users', 'User:') }}
@php
    $user = DB::table('users')->pluck('name','id');
    // dump($account);
    $selectAttributer = ['name'=>'user_id', 'value'=>'',  
    'options'=>[ $user ],                                    
    'attributes'=>['class'=>'form-select', 'id'=>'user']];
@endphp
@include('fields.select', ['attributes'=>$selectAttributer])
<br>