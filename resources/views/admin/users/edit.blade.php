@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>Edit User</h3>
        <div class="row">
            <div class="col-sm-3" align="">
                <img height="250px" width="250px" scr="{{$user->user_photo ? $user->user_photo->photo_path : '/storage/app/images/istockphoto.jpg'}}"
                     alt="" class="img-responsive img-rounded">
            </div>

            <div class="col-md-7" align="">

                {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'enctype'=>"multipart/form-data"]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('role_id', 'Role') !!}
                    {!! Form::select('role_id', [''=>'Choose Role'] + $roles, null, ['class' => 'form-control']) !!}
                </div>

            <!-- {!! Form::select('status', array(1 => 'Large', 2 => 'Small'), null, ['class' => 'form-control']) !!}
                    -->

                <div class="form-group">

                </div>
                {!! Form::label('photo_path', 'Upload Photo') !!}
                {!! Form::file('photo_path', null, ['class' => 'form-control']) !!}
                <div>
                    <br>
                    {!! Form::submit('Edit Post', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}

                @include('includes.create_user_error')

            </div>
        </div>
    </div>
@endsection
