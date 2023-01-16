<!DOCTYPE html>
<html x-data="data()" lang="en">

<head>
  @include('includes.dashboard.meta')
  <title>SI LOWONGAN KERJA</title>
  @stack('before-style')

  @include('includes.dashboard.style')

  @stack('after-style')
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    @include('includes.dashboard.navbar')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    @yield('content')

    </div>
  </div>
  @stack('before-script')

  @include('includes.dashboard.script')

  @stack('after-script')

  <script>
    $(document).ready(function () {
        $('#data1').DataTable();
        $('#data2').DataTable();
    });
  </script>

</body>
  
</html>
