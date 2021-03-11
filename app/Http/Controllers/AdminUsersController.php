<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Photo;
use App\Role;
use Illuminate\Http\Request;
use App\User;

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
        //User::create($request->all());
        //return redirect('/admin/users');

        $input = $request->all();
        //print_r($input);

        if($request->hasFile('photo_path')) {
            $file = $request->file('photo_path');
            $name = time() . "_" . $file->getClientOriginalName();

            //echo $name;
            $file->storeAs('images', $name);

            $photo = Photo::create(['photo_path'=>$name]);
            $input['photo_id'] = $photo->id;

        } else {
            echo "No File Detected";
        }


        $input['password'] = bcrypt($request->password);

        User::create($input);
        //return $request->all();

        //return $input;

        return redirect('admin/users');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.users.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
