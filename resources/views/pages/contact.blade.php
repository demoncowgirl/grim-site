<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('title', '| Contact Us')

@extends('layouts.app')
@include('inc._header')

@section('content')
  <div class = "d-flex flex-row">
    <div class="col-lg-4">@include('inc._sidebar')</div>
    <div class = "col-lg-8 p-4">
      <h5>Email:</h5> <p>{{ $bandemail }}</p>
      <h5>Phone:</h5> <p>{{ $bandphone }}</p>
      <h5>Mailing Address:</h5>
      <p>{{ $bandaddress['bandcontact'] }}</p>
      <p>{{ $bandaddress['bandstreetaddress'] }}</p>
      <p>{{ $bandaddress['bandcity'] }}, {{ $bandaddress['bandstate'] }} {{ $bandaddress['bandzip'] }}</p>
      <p>{{ $bandaddress['bandcountry'] }}</p>
    <hr>
    <form>
      <div class="form-group">
        <form data-parsley-validate method="POST" action="{{ action('MessageController@store') }}">
           @csrf
        <label name="email">Email:</label>
        <input id="email" name="email" class="form-control" placeholder="Email address">
      </div>
      <div class="form-group">
        <label name="name">Name:</label>
        <input id="name" name="name" class="form-control" placeholder="Name">
      </div>
      <div class="form-group">
        <label name="message">Message:</label>
        <textarea id="message" name="message" class="form-control"placeholder="Type your message here."></textarea>
      </div>
      {{-- <input class ="btn btn-dark" type="submit" value="Send Message"> --}}
      <button type="submit" class="btn btn-dark btn-md m-1">Send Message</button>
    </form>
    </div>
  </div>
@endsection
