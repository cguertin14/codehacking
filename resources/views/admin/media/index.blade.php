@extends('layouts.admin')

@section('content')

    @include('include.hover')

    @if (Session::has('deleted_media'))
        <p class="bg-danger">{{session('deleted_media')}}</p>
    @endif

    <h1>Media</h1>

    @if ($photos)

      <form action="delete/media" method="post" class="form-inline">
        {{csrf_field()}}
        {{method_field('delete')}}
        <div class="form-group">
          <select name="checkBoxArray" class="form-control">
              <option value="delete">Delete</option>
          </select>
        </div>
        <div class="form-group">
          <input type="submit" class="btn-primary" name="delete_all">
        </div>

        <table class="table">
          <thead>
            <tr>
              <th><input type="checkbox" id="options"></th>
              <th>Id</th>
              <th>Photo</th>
              <th>Created At</th>
            </tr>
          </thead>
          <tbody class="hoverTable">
            @foreach ($photos as $photo)
              <tr>
                <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                <td>{{$photo->id}}</td>
                <td><img height="50" src="{{$photo->file}}" alt=""></td>
                <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
                <td>
                    {{-- {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy',$photo->id]]) !!} --}}

                        <div class="form-group">
                          {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                          <input type="hidden" name="photo" value="{{$photo->id}}">
                          <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
                        </div>

                    {{-- {!! Form::close() !!} --}}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </form>

      <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
          {{$photos->render()}}
        </div>
      </div>
    @endif


@endsection

@section('scripts')

  <script type="text/javascript">

      $(document).ready(function() {
          $("#options").click(function() {
              if (this.checked) {
                  $('.checkBoxes').each(function() {
                      this.checked = true;
                  });
              } else {
                $('.checkBoxes').each(function() {
                    this.checked = false;
                });
              }
          });
      });

  </script>

@endsection
