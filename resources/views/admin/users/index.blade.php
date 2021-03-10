@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div>
                    <h1>Users</h1>
                </div>
                <div class="">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created</th>
                            <th>Last Updated</th>
                          </tr>
                        </thead>
                        <tbody>

                        @if($users)
                            @foreach($users as $user)

                          <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->user_role->name}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>
                          </tr>

                            @endforeach
                        @endif
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection
