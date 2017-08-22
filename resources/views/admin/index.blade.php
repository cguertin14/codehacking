@extends('layouts.admin')

@section('content')

  <h1>Admin</h1>

  <br>

  <div class="list-group col-sm-6">
    <a href="{{route('admin.users.index')}}" class="list-group-item">View All Users</a>
    <a href="{{route('admin.posts.index')}}" class="list-group-item">View All Posts</a>
    <a href="{{route('admin.categories.index')}}" class="list-group-item">View All Categories</a>
    <a href="{{route('admin.media.index')}}" class="list-group-item">View All Media</a>
    <a href="{{route('admin.comments.index')}}" class="list-group-item">View All Comments</a>
  </div>

@endsection
