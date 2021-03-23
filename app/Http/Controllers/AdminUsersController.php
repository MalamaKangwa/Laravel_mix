<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UserRequest;
use App\Photo;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use Session;

class AdminUsersController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $input = $request->all();
        //print_r($input);

        if($request->hasFile('photo_path')) {
            $file = $request->file('photo_path');
            $name = time() . "_" . $file->getClientOriginalName();

            //echo $name;
            $file->storeAs('images', $name);

            $photo = Photo::create(['photo_path'=>$name]);
            $input['photo_id'] = $photo->id;

        }

        $input['password'] = bcrypt($request->password);

        User::create($input);

        return redirect('admin/users');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.edit', compact('user','roles'));
    }

    public function update(EditUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $input = $request->all();

        if($request->hasFile('photo_path')) {
            $file = $request->file('photo_path');
            $name = time() . "_" . $file->getClientOriginalName();

            //echo $name;
            $file->storeAs('images', $name);

            $photo = Photo::create(['photo_path'=>$name]);
            $input['photo_id'] = $photo->id;

        }

        if(trim($request->password) == ''){
            $input = $request->except('password');
        } else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        $user->update($input);

        return redirect('/admin/users');

        //return $input;
        //return $request->all();
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        unlink(public_path() . $user->user_photo->photo_path);
        $user->delete();

        $request->session()->flash('deleted_user', 'Task was successful!');

        return redirect('/admin/users');
    }
}
