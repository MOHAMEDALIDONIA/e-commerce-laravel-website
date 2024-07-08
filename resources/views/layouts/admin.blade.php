<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')|{{ config('app.name', 'Laravel') }}</title>
            <!-- plugins:css -->
      <link rel="stylesheet" href="{{asset('Admin/vendors/mdi/css/materialdesignicons.min.css')}}">
      <link rel="stylesheet" href="{{url('Admin/vendors/base/vendor.bundle.base.css')}}">
      <!-- endinject -->
      <!-- plugin css for this page -->
      <link rel="stylesheet" href="{{url('Admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <link rel="stylesheet" href="{{url('Admin/css/style.css')}}">
      <!-- endinject -->
      <link rel="shortcut icon" href="{{url('Admin/images/favicon.png')}}" />
      <style>
        .sidebar .nav .nav-item.active{
          background-color: #e9e9e9;
        }
      </style>

    @livewireStyles
  </head>
 <body>

  <div class="container-scroller">
    @include('layouts.inc.admin.navbar')
    <div class="container-fluid page-body-wrapper">
      @include('layouts.inc.admin.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')

        </div>
      </div>
    </div>   

  </div>
     <!-- plugins:js -->
    <script src="{{asset('Admin/vendors/base/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->

    <script src="{{url('Admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{url('Admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    
    <script src="{{asset('Admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('Admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('Admin/js/template.js')}}"></script>

    <script src="{{url('Admin/js/dashboard.js')}}"></script>
    <script src="{{asset('Admin/js/dashboard.js')}}"></script>
    <script src="{{asset('Admin/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('Admin/js/dataTables.bootstrap4.js')}}"></script>
    @yield('scripts')
    @livewireScripts
    @stack('scripts')
    </body>
</html>