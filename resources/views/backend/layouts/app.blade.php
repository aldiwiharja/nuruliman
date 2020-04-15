<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ url('uploads/admin/favicon/favicon.ico') }}" rel="icon">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('backend/docs/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/docs/css/baguetteBox.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://sdk.pushy.me/web/1.0.5/pushy-sdk.js"></script>
  </head>
  <body class="app sidebar-mini">
    <div id="loadoverlay" class="loading sembunyi">Loading&#8230;</div>
    @include('backend.layouts.navbar')
    @include('backend.layouts.sidebar')
    @yield('content')
    <!-- Essential javascripts for application to work-->
    <script src="{{ url('backend/docs/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('backend/docs/js/baguetteBox.js') }}"></script>
    <script src="{{ url('backend/docs/js/popper.min.js') }}"></script>
    <script src="{{ url('backend/docs/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('backend/docs/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/docs/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/docs/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/docs/js/plugins/dropzone.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/docs/js/plugins/bootstrap-notify.min.js') }}"></script>
    <script type="text/javascript">$('#table').DataTable();</script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ url('backend/docs/js/plugins/pace.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    {{-- <script>
      var vapidkey = '{{ config('app.vapid') }}';
    </script>

    <script src="{{ asset('js/enable-push.js') }}" defer></script> --}}
    @yield('script');
    <!-- Page specific javascripts-->
    
    
    @auth
      <script>
          $('.nav-item').on('click', function() {
              $('#loadoverlay').removeClass('sembunyi');
          });
          // Register device for push notifications
          Pushy.register({ appId: '5e8b66f0adead2f2494633b8' }).then(function (deviceToken) {
              // Print device token to console

              $.ajax({
                url: "{{ route('store.device.token') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                  _token: "{{ csrf_token() }}",
                  device_token: deviceToken
                },
                success: function(res){
                  console.log(res)
                },
                error: function(err){
                  console.log(err);
                }
              });
              
          }).catch(function (err) {
              // Handle registration errors
              console.error(err);
          });
      </script>
    @endauth
  </body>
</html>