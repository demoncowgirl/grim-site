@extends('layouts.app')
@include('inc._navbar')

@section('title', '| Inventory')

@section('content')
<div class="container mt-3">
<div class="row">
  <div class="col-lg-12">
    <h1>Inventory</h1>
    <table class="table">
    <a href="{{ route('items.create') }}" class="btn btn-lg btn-block btn-secondary m-1">Add New Item</a>
      <thead>
        <th>#</th>
        <th>Item Name</th>
        <th></th>
        <th>Description</th>
        <th>Size</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>User</th>
        <th>Created On</th>
      </thead>
      <tbody>
        @foreach($items as $item)
        <tr>
          <th>{{ $item-> id }}</th>
          <th>{{ $item-> itemName }}</th>
          <td><img src="{{ asset('storage/merch/' .  $item -> image) }}" height="180" width="auto"></img</td>
          <th><h6>{{ $item-> description }}</h6></th>
          <td>{{ $item -> size }}</td>
          <td>{{ $item -> quantity }}</td>
          <th>{{ $item-> price }}</th>
          <td>{{ $item-> user_id }}</td>
          <td>{{ date('M j, Y', strtotime($item->created_at)) }}</td>
          <td>
            <a href="{{ route('items.edit', $item -> id)}}" class="btn btn-sm btn-light m-1" method="GET">Edit</a><br>
            <a href="{{ route('items.destroy', $item->id) }}" class="btn btn-danger btn-sm" method="DELETE">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>

@endsection
