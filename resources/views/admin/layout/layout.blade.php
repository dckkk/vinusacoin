<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>AdminLTE 2 | @yield('page_title')</title>
    @component('admin/layout/css')
    @endcomponent

    @yield('css')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      
      @component('admin/layout/header')
      @endcomponent

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('content')
      </div>
      <!-- /.content-wrapper -->

      @component('admin/layout/footer')
      @endcomponent
    </div>
    @component('admin/layout/javascript')
    @endcomponent

    @yield('javascript')
  </body>
</html>
