<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return view('admin.users.index');
    }

    //Show the form for creating a new resource.
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        return view('admin.users.store');
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
