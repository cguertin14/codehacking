@extends('layouts.admin')

@section('content')

    @if (Session::has('deleted_post'))
        <p class="bg-danger">{{session('deleted_post')}}</p>
    @endif

    <h1>Posts</h1>

    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Photo</th>
          <th>Owner</th>
          <th>Category</th>
          <th>Title</th>
          <th>Body</th>
          <th>Post Link</th>
          <th>Comments</th>
          <th>Created</th>
          <th>Updated</th>
        </tr>
      </thead>
      <tbody>
        @if ($posts)
          @foreach($posts as $post)
            <tr>
              <td>{{$post->id}}</td>
              <td><img width="" height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/200x200'}}" alt=""></td>
              <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
              <td>{{$post->category ? $post->category->name : 'No category here'}}</td>
              <td>{{$post->title}}</td>
              <td>{!! str_limit($post->body,30) !!}</td>
              <td><a href="{{route('home.post',$post->slug)}}">View Post</a></td>
              <td><a href="{{route('admin.comments.index',$post->id)}}">View comments</a></td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>
          @endforeach
        @endif
      </tbody>
    </table>

    <div class="row">
      <div class="col-sm-6 col-sm-offset-5">
        {{$posts->render()}}
      </div>
    </div>

@endsection
