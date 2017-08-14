@extends('layouts.admin')

@section('content')

    @include('include.hover')

    <h1>Media</h1>

    @if ($photos)
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created At</th>
          </tr>
        </thead>
        <tbody class="hoverTable">
          @foreach ($photos as $photo)
            <tr class='clickable-row' data-href='{{route('admin.posts.edit',$photo->id)}}'>
              <td>{{$photo->id}}</td>
              <td><img height="50" src="{{$photo->file}}" alt=""></td>
              <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif


@endsection
