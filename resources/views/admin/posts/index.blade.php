@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Posts</h1>

        <div class="row">
            <div class="col-md-8">
                <table class="table table-hover">
                    <thead>
                      <tr>
                          <th>ID</th>
                          <th>Photo</th>
                          <th>Title</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Body</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if($posts)
                        @foreach($posts as $post)
                      <tr>
                          <td>{{$post->id}}</td>
                          <td><img width="40" height="40" src="{{$post->posts_photo ? $post->posts_photo->photo_path : '/storage/app/images/indexed.gif' }}"></td>
                          <td>{{$post->title}}</td>
                          <td>{{$post->posts_user->name}}</td>
                          <td>{{$post->posts_category ? $post->posts_category->name : 'Uncategorized'}}</td>
                          <td>{{$post->post_content}}</td>
                      </tr>

                        @endforeach
                    @endif
                    </tbody>
                  </table>
            </div>
        </div>

    </div>
@endsection
