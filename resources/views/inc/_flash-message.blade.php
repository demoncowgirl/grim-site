<div id="messages" class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3 mt-3">
    @if(Session::has('danger'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Danger:</strong> {{ Session::get('danger') }}
    </div>
    @endif

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Success:</strong> {{ Session::get('success') }}
    </div>
    @endif

    @if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Error:</strong>
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
    @endif
    </div>
  </div>
</div>
