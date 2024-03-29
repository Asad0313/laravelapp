<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
//        User::create($request->all());

        if (trim($request->password == '')){

            $input = $request->except('password');


        }else{
            $input = $request->all();

            $input['password'] = bcrypt($request->password);
        }



        if($file = $request->file('photo_id')){

            $name = time(). $file->getClientOriginalName();

            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;



        }
        $input['password'] = bcrypt($request->password);
        User::create($input);

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrfail($id);

        $roles = Role::pluck('name','id')->all();

        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //


        $user = User::findOrfail($id);


        if (trim($request->password == '')){

            $input = $request->except('password');


        }else{
            $input = $request->all();

            $input['password'] = bcrypt($request->password);
        }


        $input = $request->all();
        if($file = $request->file('photo_id')){
              $name = time() . $file->getClientOriginalName();
              $file->move('images',$name);

              $photo =Photo::create(['file'=> $name]);
              $input['photo_id'] = $photo->id;

        }

        $user->update($input);

        return redirect('/admin/users');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        User::findOrfail($id)->delete();

        Session::flash('deleted_user', 'The User Has Been Deleted');

        return redirect('/admin/users');

    }
}
