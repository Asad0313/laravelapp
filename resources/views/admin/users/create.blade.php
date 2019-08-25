@extends('layouts.admin')
@section('content')
    <h1>CREATE</h1>
    {{csrf_field()}}

    {!!Form :: open(['method' => 'POST','action' => 'AdminUsersController@store','files' => true])!!}

    <div class ="form-group">
    {!! Form::label('name','Name')!!}
        {!! Form::text('name',null,['class'=>'form-control'])!!}
    </div>
    <div class ="form-group">
        {!! Form::label('email','Email')!!}
        {!! Form::email('email',null,['class'=>'form-control'])!!}
    </div>
    <div class ="form-group">
        {!! Form::label('role_id','Role')!!}
        {!! Form::select('role_id',[''=> 'Choose Option']+ $roles, null,['class'=>'form-control'])!!}
    </div>
    <div class ="form-group">
        {!! Form::label('photo_id','Photo:')!!}<br>
        {!! Form::file('photo_id',null,['class'=>'form-control'])!!}
    </div>
{{--    <div class ="form-group">--}}
{{--        {!! Form::label('photo_id','PhotoName:')!!}--}}
{{--        {!! Form::text('photo_id',null,['class'=>'form-control'])!!}--}}
{{--    </div>--}}

    <div class ="form-group">
        {!! Form::label('is_active','Status')!!}
        {!! Form::Select('is_active',array(1 => 'Active', 0 => 'Not Active'),0,['class'=>'form-control'])!!}
    </div>
    <div class ="form-group">
        {!! Form::label('password','Password:')!!}
        {!! Form::password('password',['class'=>'form-control'])!!}
    </div>
    <div class="form-group">

        {!! Form::submit('Create Post',['class'=>'btn btn-primary'])!!}

    </div>
    {!! Form::close()!!}

    @include('include.form_validation')



    @stop