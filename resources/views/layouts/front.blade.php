<!DOCTYPE html>
<html x-data="data()" lang="en">

<head>
  @include('includes.landing.meta')
  <title>DINKES</title>
  @stack('before-style')

  @include('includes.landing.style')

  @stack('after-style')
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    @include('includes.landing.navbar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->

      @yield('content')

    </div>
  </div>
  @stack('before-script')

  @include('includes.landing.script')

  @stack('after-script')

  <script>
    $(document).ready(function () {
        $('#data1').DataTable();
        $('#data2').DataTable();
    });
  </script>

</body>
  
</html>
