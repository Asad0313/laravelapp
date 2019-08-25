@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))

        <p>{{session('deleted_user')}}</p>

        @endif
    <h1>USERS</h1>

    <table class ="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created_At</th>
            <th>Updated_At</th>


        </tr>

        </thead>
        <tbody>
        {{csrf_field()}}

        @if($users)


            @foreach($users as $user)


            <tr>
                  <td>{{$user->id}}</td>
                <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http:://placehold.it/400x400'}}" alt=""></td>
                <td><a href="{{route('admin.users.edit',$user->id)}}" >{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                   <td>{{$user->is_Active == 1 ? 'Active' : 'Not Active'}}</td>
                   <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>





            </tr>
            @endforeach

            @endif



        </tbody>






    </table>



    @stop