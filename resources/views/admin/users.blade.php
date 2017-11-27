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
@section('location','Administrator')
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
      <li> <a href="{{ url('admin') }}"><i class="icon-home"></i>Home</a></li>
      <li><a href="{{ route('users') }}"><i class="icon-user"></i>User Management</a></li>
      <li><a href="#statics" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Advert Managemnet </a>
        <ul id="statics" class="collapse list-unstyled">
          <li><a href="#">Link Stats</a></li>
        </ul>
      </li>
      <li> <a href="tables.html"> <i class="icon-grid"></i>Payment Management </a></li>
    </ul>
  </nav>
@endsection
@section('content')
  <section class="dashboard-header">
    <div class="container">
      <table class="table table-striped">
        <thead>
          <th>Users's Email</th>
          <th>Users's Roles</th>
          <th>Actions</th>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->email }}</td>
              <td>
              @foreach ($user->roles as $roles)
                {{ $roles->name }} |
              @endforeach
              </td>
                <td><a href="{{ route('users.create', 'shortcode' .'='. $user->id) }}">Assing roles</a> | <a href="#">Blacklist</a></td>
            </tr>
          @endforeach

        </tbody>
      </table>
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
