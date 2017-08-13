@extends('layouts.admin')



@section('content')

    <h1>Create post</h1>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store','files'=>true]) !!}

        <div class="form-group">
          {!! Form::label('title', 'Title: ') !!}
          {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('category_id', 'Category: ') !!}
          {!! Form::select('category_id', array('0'=>'PHP',1 => 'Javascript',2=>'C++'),0, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('photo_id', 'Photo: ') !!}
          {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('body', 'Description: ') !!}
          {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

    @include('include.formerrors')

@endsection
