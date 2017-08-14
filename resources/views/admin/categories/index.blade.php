@extends('layouts.admin')

@section('content')

    <h1>Categories</h1>

    @include('include.hover')

    @if (Session::has('deleted_post'))
        <p class="bg-danger">{{session('deleted_post')}}</p>
    @endif

    <div class="col-sm-6">

      {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store']) !!}

          <div class="form-group">
            {!! Form::label('name', 'Name: ') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
            {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
          </div>

      {!! Form::close() !!}

      @include('include.formerrors')

    </div> <!--Create Category-->

    <div class="col-sm-6">

      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Created At</th>
          </tr>
        </thead>
        <tbody class="hoverTable">
          @if ($categories)
            @foreach($categories as $category)
              <tr class='clickable-row' data-href='{{route('admin.categories.edit',$category->id)}}'>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>

    </div>

@endsection
