@extends('layouts.admin')

@section('content')

    @include('include.hover')

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
          <th>Created</th>
          <th>Updated</th>
        </tr>
      </thead>
      <tbody class="hoverTable">
        @if ($posts)
          @foreach($posts as $post)
            <tr class='clickable-row' data-href='{{route('admin.posts.edit',$post->id)}}'>
              <td>{{$post->id}}</td>
              <td><img width="" height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/200x200'}}" alt=""></td>
              <td>{{$post->user->name}}</td>
              <td>{{$post->category ? $post->category->name : 'No category here'}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->body}}</td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>
          @endforeach
        @endif
      </tbody>
    </table>

@endsection
