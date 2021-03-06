<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('title', '| Contact Us')

@extends('layouts.app')
@include('inc._header')
@section('content')

  <!-- @include('inc._sidebar') -->
  <div id="content" class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
        <h1>Here's How You Can Contact us!</h1>
        <hr>
        <h5>Phone:</h5> <p>{{ $bandphone }}</p>
        <hr>
        <h5>Mailing Address:</h5>
        <p>{{ $bandaddress['bandcontact'] }}</p>
        <p>{{ $bandaddress['bandstreetaddress'] }}</p>
        <p>{{ $bandaddress['bandcity'] }}, {{ $bandaddress['bandstate'] }} {{ $bandaddress['bandzip'] }}</p>
        <p>{{ $bandaddress['bandcountry'] }}</p>
        <hr>
        <h5>To email directly,<br>click envelope icon below:</h5>
        <p><a href="mailto:boboedy@yahoo.com"><i class="fas fa-envelope fa-3x"></i></a></p>
        <h5>Or login to use our online form:</h5>
      <hr>

    @if (auth()->check())
    @include('inc._flash-message')
    <h1>Contact Form</h1>
      <div class="form-group">
        <form method="POST" action="{{ action('MessageController@store') }}">
           @csrf
        <label for="email">Email:</label>
        <input v-model="email" name="email" class="form-control" type="text" placeholder="Email address" value="{{ Auth::user()->email }}">
      </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input v-model="name" name="name" class="form-control" type="text" placeholder="Name" value="{{ Auth::user()->name}}">
      </div>
      <div class="form-group">
        <label for="message">Message:</label>
        <textarea v-model="message" name="message" class="form-control" type="text" placeholder="Type your message here."></textarea>
      </div>
      <button type="submit" class="btn btn-dark btn-md m-1">Send Message</button>
    </form>
    @else
      <a href="{{ url('auth/login') }}" class="btn btn-md btn-primary m-1">Login</a>
    @endif
  </div>
@endsection
