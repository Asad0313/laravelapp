@extends('layouts.admin')
@section('content')
    <h1>EDIT USERS</h1>
    <div class="class row">

    <div class="col-sm-3">

        <img src="{{$user->photo ? $user->photo->file : 'http:://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
    </div>


   <div class="col-sm-9">

    {!!Form :: model($user,['method' => 'PATCH','action' => ['AdminUsersController@update',$user->id],'files' => true])!!}

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
        {!! Form::select('role_id', $roles, null,['class'=>'form-control'])!!}
    </div>
    <div class ="form-group">
        {!! Form::label('photo_id','Photo:')!!}<br>
        {!! Form::file('photo_id',null,['class'=>'form-control'])!!}
    </div>


    <div class ="form-group">
        {!! Form::label('is_active','Status')!!}
        {!! Form::Select('is_active',array(1=> 'Active', 0=> 'Not Active'),null,['class'=>'form-control'])!!}
    </div>
    <div class ="form-group">
        {!! Form::label('password','Password:')!!}
        {!! Form::password('password',['class'=>'form-control'])!!}
    </div>
    <div class="form-group">

        {!! Form::submit('EDIT Post',['class'=>'btn btn-primary col-sm-6'])!!}

    </div>
    {!! Form::close()!!}
   </div>
    </div>

        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id],'class'=>'pull-centre']) !!}

        <div class="form-group">
                   {!! Form::submit('Delete User',['class' => 'btn btn-danger col-sm-6 ']) !!}



        </div>
        {!! Form::close() !!}

    </div>

    @include('include.form_validation')



@stop