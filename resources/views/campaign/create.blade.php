@extends('layouts.app')
@section('css')
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/jquery.bootstrap-touchspin.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
  <link rel="stylesheet" href="{{ asset('css/style.blue.css') }}" id="theme-stylesheet">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <link rel="shortcut icon" href="img/favicon.ico">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="{{ asset('js/jquery.bootstrap-touchspin.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
  <script src="https://use.fontawesome.com/99347ac47f.js"></script>
  <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
@endsection
@section('location','Create campaign')
@section('links')
  <nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{ asset('img/avatar-1.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h4">{{ Auth::user()->name }}</h1>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
      <li> <a href="{{ url('advert') }}"><i class="icon-home"></i>Home</a></li>
      <li><a href="#statics" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Create Campaign</a>
        <ul id="statics" class="collapse list-unstyled">
          <li  class="active"><a href="#">New  Campaign</a></li>
          <li><a href="#">Ongoing  Campaign</a></li>
        </ul>
      </li>
    </ul>
  </nav>
@endsection
@section('content')
  <section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
      <div class="row bg-white has-shadow">
        <div class="text">
          <h3>Create campaign</h3>
          <small>Here is where you set all stuffs</small>
        </div>
        <hr/>
      </div>
      <div class="row bg-white has-shadow">
        {{ Form::open(array("class"=>"form-horizontal","role"=>"form","route"=>"campaign.store")) }}
        <div class="form-group">
          <label for="demo2" class="col-md-6 control-label">Campaing Name</label>
          <input id="demo2" type="text" name="name" class="col-md-8 form-control">
        </div>
        <div class="form-group">
          <label for="demo2" class="col-md-6 control-label">Campaing Budget</label>
          <input id="demo2" type="text" value="10,000" name="budget" class="col-md-8 form-control">
        </div>
        <div class="form-group">
          <label for="demo2" class="col-md-6 control-label">Campaing Runtime</label>
          <div class="input-daterange input-group" id="datepicker">
            <input type="text" class="input-sm form-control" name="start" />
            <span class="input-group-addon">to</span>
            <input type="text" class="input-sm form-control" name="end" />
          </div>
        </div>
        <div class="form-group">
          <label for="demo2" class="col-md-6 control-label">Choose Advert</label>
          <select name="advert" class="form-control">
          @foreach ($advert as $advert)
            <option value="{{$advert->id}}">{{ $advert->name }}</option>
          @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Campaign</button>
        {{ Form::close() }}
      </div>
    </div>
  </section>
@endsection
@section('js')
  <script>
  $("input[name='budget']").TouchSpin({
    min: -1000000000,
    max: 1000000000,
    step: 1000,
    maxboostedstep: 10000000,
    prefix: 'TZS'
  });

  $('.input-daterange').datepicker({
  });
  </script>
  <!-- Javascript files-->
  <script src="{{ asset('js/tether.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.cookie.js') }}"> </script>
  <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('js/front.js') }}"></script>
  <!-- Scripts -->
@endsection
