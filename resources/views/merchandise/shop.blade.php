<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('title', '| Shop')

@extends('layouts.app')

@include('inc._header')

@section('content')
  <div id="content">
  <div id="cards" class="container-fluid">
  <div class="row">
      @foreach($items as $item)
      <div id="shopCard" class="card mt-3">
        <div class="card-block">
        <h3 class="card-header"><strong>{{ $item -> itemName }}</strong></h3>
        <div class="card-body">
        <img id="shopCard" img-responsive justify-content-center style="margin-bottom: 20px;" src="{{ asset('https://s3.amazonaws.com/grim-images/merch/' . $item->image)}}" height="300" width="auto"> </img>
        <p><strong>Price: $</strong>{{ $item -> price}}</p>
        <p><strong>Description: </strong>{{ $item -> description}}</p>
        <form>
        @if($item -> size != null)
        <p><strong>Size: </strong>{{ $item -> size}}</p>
        @endif
      <form>
        <label class="mt-1" for="quantity">Quantity</label>
        <input class="form-control w-25" id="quantity" name="quantity" type="text"></input>
      </form>
          <!-- <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <button type="button" class="btn btn-outline-dark">Quantity</button>
            <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">1</a>
              <a class="dropdown-item" href="#">2</a>
              <a class="dropdown-item" href="#">3</a>
            </div>
          </div>
          </div> -->
          <a href="{{ route('cart.store')}}" class="btn btn-success" method="GET">Add to Cart</a>
        </form>
      </div>
      </div>
      </div>
      @endforeach
</div>
</div>
</div>
@endsection
