@extends('layouts.admin')

@section('content')

  @if (Session::has('deleted_user'))
      <p class="bg-danger">{{session('deleted_user')}}</p>
  @endif

  @section('scripts')
    @include('include.hover')
  @endsection

  <h1>Users</h1>

  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody class="hoverTable">
      @if ($users)
        @foreach($users as $user)
          <tr class='clickable-row' data-href='{{route('admin.users.edit', $user->id)}}'>
            <td>{{$user->id}}</td>
            <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/50x50' }}" alt=""></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role === null ? 'User has no role' : $user->role->name}}</td>
            <td>{{$user->is_active === 1 ? 'Active' : 'Not Active'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
          </tr>
        @endforeach
      @endif
    </tbody>
  </table>

<div class="row">
  <div class="col-sm-6 col-sm-offset-5">
    {{$users->render()}}
  </div>
</div>

@stop
