@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{'deleted_user'}}</p>
    @endif

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
                            <th>Photo</th>
                            <th>Firstname</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created</th>
                            <th>Last Updated</th>
                            <th>Has Access?</th>
                          </tr>
                        </thead>
                        <tbody>

                        @if($users)
                            @foreach($users as $user)

                          <tr>
                            <td>{{$user->id}}</td>
                            <td><img height="30" width="30"
                                     src="{{$user->user_photo ? $user->user_photo->photo_path : '/storage/app/images/istockphoto.jpg'}}"></td>
                              <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->user_role->name}}</td>
                            <td>{{$user->created_at}}</td>
                              <td>{{$user->updated_at->diffForHumans()}}</td>
                              <td>{{$user->user_role->name == 'Admin' ? 'Yes':'No'}}</td>

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
