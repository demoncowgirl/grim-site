@extends('layouts.app')
@include('inc._navbar')

@section('title', '| Manage Comments')

@section('content')
<div class="container mt-3">
  <div class="row">
    <div class="col-lg-12">
        <h1>All Blog Comments</h1>
    </div>
    <div class="col-lg-12"><hr></div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <table class="table">
        <thead>
          <th>#</th>
          <th>Username</th>
          <th>Comment</th>
          <th>Post ID</th>
          <th>Created At</th>
          <th>Status</th>
          <th>Approved At</th>
          <th></th>
        </thead>
        <tbody>
          @foreach($comments as $comment)
          <tr>
            <th>{{ $comment-> id }}</th>
            <th>{{ $comment->username }}</th>
            <td>{{ $comment->comment }}</td>
            <td>{{ $comment-> post_id }}</td>
            <td>{{ date('M j, Y', strtotime($comment -> created_at)) }}</td>
            <td>{{ $comment-> approved}}</td>
            <td>{{ date('M j, Y', strtotime($comment -> approved_at)) }}</td>
            <td>
              <a href="{{ route('comments.show', $comment -> id)}}" class="btn btn-block btn-secondary" method="GET">View Comment</a><br>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
