<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        return $request->all();
        //return view('admin.users.store');
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
