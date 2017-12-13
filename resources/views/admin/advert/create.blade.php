@extends('layouts.app')
@section('css')
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
  <link rel="stylesheet" href="{{ asset('css/style.blue.css') }}" id="theme-stylesheet">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <link rel="shortcut icon" href="img/favicon.ico">
  <script src="https://use.fontawesome.com/99347ac47f.js"></script>
  <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
  {!! Charts::assets() !!}
@endsection
@section('location','Advert Management')
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
      <li> <a href="{{ route('ads.index') }}"><i class="icon-home"></i>Home</a></li>
      <li class="active"><a href="{{ route('ads.create') }}"><i class="icon-user"></i>Advert Management</a></li>
    </ul>
  </nav>
@endsection
@section('content')
  <section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
      <div class="row bg-white has-shadow">
        <div class="col-md-6 offset-3">
          {{Form::open(array('route'=>'ads.store','files'=>true))}}
          <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
            <label class="form-control-label">Advert Name</label>
            <input placeholder="Enter advert name" class="form-control" type="text" name="title" value="{{ old('title') }}">
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
            <label class="form-control-label">Short Description</label>
            <textarea name="description" class="form-control" placeholder="Enter your short description" value="{{ old('description') }}"></textarea>
            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('advert') ? ' has-error' : '' }}">
            <label class="form-control-label">Artwork <span class="alert-danger">mininmun size is 1920 * 1080</span></label>
            <input type="file" name="advert" class="form-control">
            @if ($errors->has('advert'))
                <span class="help-block">
                    <strong>{{ $errors->first('advert') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            <input value="Create Advert" class="btn btn-primary" type="submit">
          </div>
        </form>
        {{-- @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif --}}
      </div>
    </div>
  </div>
</section>
@endsection
@section('js')
  <!-- Javascript files-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="{{ asset('js/tether.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.cookie.js') }}"> </script>
  <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script src="{{ asset('js/charts-home.js') }}"></script>
  <script src="{{ asset('js/front.js') }}"></script>
  <!-- Scripts -->
@endsection
