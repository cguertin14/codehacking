@extends('layouts.admin')

@section('content')

    @section('scripts')
        @include('include.hover')
    @endsection

    <style>
        .image {
            cursor: pointer;
            elevation: higher;
        }
    </style>

    <div class="container text-center">
        <a href="{{$user->photo ? route('admin.media.show',$user->photo->id): ""}}">
            <img class="{{$user->photo ? "image" : ""}} " height="200" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/50x50' }}" alt="">
        </a>
    </div>

    <h1 class="text-center">{{$user->name}}</h1>

    <br>
    <br>
    <br>

    <div class="container text-center">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-left">Email</th>
                    <th class="text-left">Role</th>
                    <th class="text-left">Status</th>
                </tr>
            </thead>
            <tbody class="hoverTable">
                <tr class='clickable-row' data-href='{{route('admin.users.edit', $user->id)}}'>
                    <td class="text-left">{{$user->email}}</td>
                    <td class="text-left">{{$user->role === null ? 'User has no role' : $user->role->name}}</td>
                    <td class="text-left">{{$user->is_active === 1 ? 'Active' : 'Not Active'}}</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection