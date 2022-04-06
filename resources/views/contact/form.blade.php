{{ Form::label('name', 'Name:') }}
@php
    $textAttributer = ['name'=>'name', 'value'=>'', 'attributes'=>['class'=>'form-control', 'id'=>'name' ]];   
@endphp
@include('fields.text', ['attributes'=>$textAttributer])

@error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br>

{{ Form::label('phone', 'Phone:') }}
@php
    $textAttributer = ['name'=>'phone', 'value'=>'', 'attributes'=>['class'=>'form-control', 'id'=>'phone']]   
@endphp
@include('fields.tel', ['attributes'=>$textAttributer])

@error('phone')
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

{{ Form::label('accounts', 'Add Account:') }}
@php
    $account = DB::table('accounts')->whereNull('deleted_at')->pluck('name','id');
     //dump($account);
    $selectAttributer = ['name'=>'account_id', 'value'=>'',  
    'options'=>[ $account ],                                    
    'attributes'=>['class'=>'form-select', 'id'=>'account']];
@endphp
@include('fields.select', ['attributes'=>$selectAttributer])
<br>


{{ Form::label('accounts', 'Remove Account:') }}
@php
    $accounts = $contact->accounts()->get();
    //$account_id[];
    foreach ($accounts as $account) {
        $account_id[] = $account->id;
        $account_name[] = $account->name; 
    }
    //dd();
    $selectAttributer = ['name'=>'account_id', 'value'=>'',  
    'options'=>[ array_combine($account_id, $account_name) ],                                    
    'attributes'=>['class'=>'form-select', 'id'=>'account']];
@endphp
@include('fields.select', ['attributes'=>$selectAttributer])
<br>    


