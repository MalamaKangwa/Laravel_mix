@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Create Posts</h1>

    <div class="row">

    </div>

    <div class="row">
        <div class="col-md-8">
            {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store','files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Category:') !!}
                    {!! Form::select('category_id', [''=>'Choose Categories'] + $categories, null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('photo_path', 'Photo:') !!}
                    {!! Form::file('photo_path', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('post_content', 'Content:') !!}
                    {!! Form::textarea('post_content', null, ['class'=>'form-control', 'rows'=>4]) !!}
                </div>

            <div>
                {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

            <div class="row">
                @include('includes.create_post_error')
            </div>

        </div>
    </div>

    </div>


@endsection
