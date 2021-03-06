@extends('layouts.app')
@include('inc._navbar')
@include('inc._flash-message')
@section('content')
  @include('inc._sidebar')
    <div id="content" class="col-sm-12 col-md-10 col-lg-8 col-xl-6">

      <div class="post mt-3">
        @if($post->image)
          <img src="{{ asset('/images/blogImages/' . $post -> image) }}" height="300" width="auto"> </img>
        @endif
          <h3>{{ $post -> title }}</h3>
          <p>{{ $post -> post }}</p>
        </div>
        <div id="comment" class="comment">
          <section>
            @foreach($post-> comments as $comment)
              @if($comment -> approved == true)
                <p><strong>UserName: </strong>{{$comment-> username}}</p>
                <p>{{ $comment-> comment}}</p>
                <p>{{ date('D, d M y H:i:s', strtotime($comment -> created_at)) }}</p>
                <hr>
              @endif
            @endforeach
            </section>
          </div>

      @if(!auth()->check())
      <hr>
      <h5>You must be registered and logged in to leave a comment.</h5>
        <a href="{{ url('auth/login') }}" class="btn btn-md btn-primary m-1">Login</a>
      @endif

    @if((auth()->check()) && (!auth()->user()->isAdmin()))
    <div id="comment-form mt-3">
     <form method="POST" action="{{ action('CommentsController@store', $post-> id) }}">
        <div class="row">
          @csrf
            <div class="col-lg-8">
             <label for="username"><strong>UserName:</strong>
            </label>
            <h3> <input class="form-control" id="username" name="username" type="textarea" value="{{ Auth::user()->username}}"></input></h3>
           </div>
          <div class="col-lg-12">
             <label for="comment"><strong>Comment:</strong></label>
             <textarea rows="10" class="form-control" id="comment" name="comment" type="textarea" value="{{ old('comment') }}"></textarea>
             @if($errors->has('comment'))
                <h5 class="alert alert-danger" role="alert"><strong>{{ $errors->first('comment') }}</strong></h5>
              @endif
          </div>
          <div class="col-lg-8">
            <button type="submit" class="btn btn-secondary btn-md">Submit Comment</button>
          </div>
        </div>
      </form>
    </div>
    @endif
  </div>

@endsection
