@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Create</h3>
            </div>

            <div class="col-md-8">

            {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'enctype'=>"multipart/form-data"]) !!}
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
                    {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}

            @include('includes.create_user_error')

            </div>
        </div>
    </div>
@endsection
