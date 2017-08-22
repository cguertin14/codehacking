@extends('layouts.blog-post')



@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : $post->photoPlaceHolder()}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{!! $post->body !!}</p>

    <hr>

    {{-- @if (Session::has('comment_message'))

      {{session('comment_message')}}

    @endif

    <!-- Blog Comments -->

    @if (Auth::check())

      <!-- Comments Form -->
      <div class="well">
          <h4>Leave a Comment:</h4>

          {!! Form::open(['method' => 'POST', 'action' => 'PostCommentController@store','files'=>true]) !!}

              <input type="hidden" name="post_id" value="{{$post->id}}">

              <div class="form-group">
                {!! Form::label('body', 'Body: ') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control','rows' => 3]) !!}
              </div>

              <div class="form-group">
                {!! Form::submit('Submit comment', ['class' => 'btn btn-primary']) !!}
              </div>

          {!! Form::close() !!}
      </div>
    @endif

    <hr>

    <!-- Posted Comments -->

    @if (count($comments) > 0)
      @foreach ($comments as $comment)
        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img height="64" width="64" class="media-object" src="{{Auth::user()->gravatar}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at->diffForHumans()}}</small>
                </h4>
                {{$comment->body}}
                @if (count($comment->replies) > 0)
                  @foreach ($comment->replies as $reply)

                    @if ($reply->is_active == 1)

                      <!-- Nested Comment -->
                      <div id="nested-comment" class="media">
                          <a class="pull-left" href="#">
                              <img height="64" width="64" class="media-object" src="{{$reply->photo}}" alt="">
                          </a>
                          <div class="media-body">
                              <h4 class="media-heading">{{$reply->author}}
                                  <small>{{$reply->created_at->diffForHumans()}}</small>
                              </h4>
                              {{$reply->body}}
                          </div>
                          <br>

                          <div class="comment-reply-container">

                            <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                            <div class="comment-reply col-sm-6">

                              {!! Form::open(['method' => 'POST', 'action' => ['CommentRepliesController@createReply']]) !!}

                                  <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                  <div class="form-group">
                                    {!! Form::label('body', 'Reply to comment: ') !!}
                                    {!! Form::textarea('body', null, ['class' => 'form-control','rows'=>1]) !!}
                                  </div>

                                  <div class="form-group">
                                    {!! Form::submit('Submit reply', ['class' => 'btn btn-primary']) !!}
                                  </div>

                              {!! Form::close() !!}

                            </div>
                          </div>
                      @endif
                  @endforeach
                  {{-- @else
                      <br>
                      <div class="comment-reply col-sm-6">
                        {!! Form::open(['method' => 'POST', 'action' => ['CommentRepliesController@createReply']]) !!}

                            <input type="hidden" name="comment_id" value="{{$comment->id}}">

                            <div class="form-group">
                              {!! Form::label('body', 'Reply to comment: ') !!}
                              {!! Form::textarea('body', null, ['class' => 'form-control','rows'=>1]) !!}
                            </div>

                            <div class="form-group">
                              {!! Form::submit('Submit reply', ['class' => 'btn btn-primary']) !!}
                            </div>

                        {!! Form::close() !!}
                      </div>
                  @endif
                  </div>
        </div>
      @endforeach
    @endif

    @section('scripts')

      <script type="text/javascript">

          $(".comment-reply-container .toggle-reply").click(function() {

              $(this).next().slideToggle("slow");

          });

      </script>

    @endsection

    <!-- Comment -->
    {{-- <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            <!-- Nested Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Nested Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <!-- End Nested Comment -->
        </div>
    </div> --}}

    <div id="disqus_thread"></div>
    <script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://codehacking-skscojcfii.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <script id="dsq-count-scr" src="//codehacking-skscojcfii.disqus.com/count.js" async></script>

@endsection
