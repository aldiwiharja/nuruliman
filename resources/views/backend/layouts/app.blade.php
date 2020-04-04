<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('backend/docs/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    @include('backend.layouts.navbar')
    @include('backend.layouts.sidebar')
    @yield('content')
    <!-- Essential javascripts for application to work-->
    <script src="{{ url('backend/docs/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('backend/docs/js/popper.min.js') }}"></script>
    <script src="{{ url('backend/docs/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('backend/docs/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/docs/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/docs/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/docs/js/plugins/dropzone.js') }}"></script>

    <script type="text/javascript">$('#table').DataTable();</script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ url('backend/docs/js/plugins/pace.min.js') }}"></script>
    <!-- Page specific javascripts-->
  </body>
</html>