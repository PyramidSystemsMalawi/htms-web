<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>TIMIS | {{$title}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" type="text/css" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" type="text/css" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" type="text/css" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" type="text/css" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" type="text/css" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" type="text/css" href="plugins/summernote/summernote-bs4.min.css">
  {{-- <link rel="stylesheet" type="text/css" href="lib.DataTable/buttons.dataTable.min.css">
  <link rel="stylesheet" type="text/css" href="lib/DataTable/jquery.dataTables.min.css"> --}}
  <link rel="stylesheet" type="text/css" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="css/fonts.css">
<link rel="stylesheet" type="text/css" href="lib/sweetalerts/sweetalert.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.23.0/pivot.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/jquery.jsx"></script>
<script>
    const BASE_URL = window.origin
</script>
<style>
    *{
        font-family: 'roboto' ;
    }
</style>
@if($title == 'Reports')
<style>
    .pivot-table-container {
        height: 200px !important;
        width: 100%;
    }
</style>
@endif
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-power-off"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="users/logout" class="dropdown-item dropdown-footer">Logout</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HTMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$userdata["firstname"]}} {{$userdata["lastname"]}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard" class="nav-link @if($title == 'Dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/users" class="nav-link @if($title == 'Users') active @endif">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/organisations" class="nav-link @if($title == 'Organisations') active @endif">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                Organisations
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/cases" class="nav-link @if($title == 'Cases' || $title == 'View Case') active @endif">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Case Files
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="/qualifiers" class="nav-link @if($title == 'TIP CheckList') active @endif">
              <i class="nav-icon fas fa-check"></i>
              <p>
                TIP ChekList
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="/victims-list" class="nav-link @if($title == 'Victims') active @endif">
              <i class="nav-icon fas fa-street-view"></i>
              <p>
                Victims
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/districts" class="nav-link @if($title == 'Districts') active @endif">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Districts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/reports" class="nav-link @if($title == 'Reports') active @endif">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Reports
              </p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@if($title == 'Reports') {{$report_group}} @endif {{$title}} @if($title == 'View Case') | {{$casedetails->reference}} @endif </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$title}} @if($title == 'View Case') | {{$casedetails->reference}} @endif </li>
            </ol>
          </div><!-- /.col -->
          <div class="col-12"><hr></div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="row">
        <div class="col-12">
            @include('messages')
        </div>
    </div>
        <!-- Small boxes (Stat box) -->
        @yield('content')
        <!-- Main row -->
        <div class="row">
            <div class="col-12">
                @foreach($qualifiers as $qualifier)
                <div class="modal fade" id="add">

                        <div class="modal-dialog modal-md">
                            <form action="/qualifiers" method="POST" >
                            @csrf
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Add Qualifier</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                  <div class="form-row">
                                      <div class="col-12 form-group">
                                          <label for="">Question :</label>
                                          <textarea type="text" name="question" placeholder="Type your question here..." name="name"
                                          class="form-control" rows="3" required></textarea>
                                      </div>
                                      <div class="form-group col-12 ">
                                          <label for="">Response Type :</label>
                                         <select name="responseType" id="responseType"  class="form-control" required>
                                             <option value="">SELECT</option>
                                             <option value="boolean">Simple Yes or No</option>
                                             <option value="bool-plus-input">Compound Yes Or No</option>
                                             <option value="multiple">Multiple Choice</option>
                                             <option value="text">Text Input</option>
                                             <option value="number">Number Input</option>
                                         </select>
                                      </div>
                                      <div id="answers_field" class="col-12 form-group d-none">
                                          <label for="">Acceptable Answers ( <small class="text-danger">Separate answers with comma </small> ):</label>
                                          <textarea placeholder="Answer One, Answer Two, ... , Last Answer"
                                           name="possible_answers" cols="30" rows="3" class="form-control"></textarea>
                                      </div>
                                      <div class="col-6 form-group">
                                          <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="nullable"
                                        id="flexCheckChecked" checked required>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Nullable ?
                                        </label>
                                        </div>
                                      </div>

                                  </div>
                          </div>
                            <div class="modal-footer justify-content-between">
                              <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                              <button type="submit"  class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                            </div>
                          </div>
                          </form>
                          <!-- /.modal-content -->
                        </div>
                      </div>
                      <button hidden data-role="modal" data-target="#updateQuestionModal"></button>

                      <div class="modal" id="updateQuestionModal{{$qualifier->id}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header bg-secondary">
                              <h5 class="modal-title text-white">Update Question</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">
                                    <input type="text" name="qid" value="{{$qualifier->id}}" class="form-control" hidden>
                                    <div class="col-12 form-group">
                                        <label for="">Question :</label>
                                        <textarea type="text" name="question" placeholder="Type your question here..." name="name"
                                        class="form-control" rows="3" required>{{$qualifier->question}}</textarea>
                                    </div>
                                    <div class="form-group col-12 ">
                                        <label for="">Response Type :</label>
                                       <select name="responseType" id="responseType"  class="form-control" required>
                                           <option value="">SELECT</option>
                                           <option @if($qualifier->responseType == 'boolean') selected @endif value="boolean">Simple Yes or No</option>
                                           <option @if($qualifier->responseType == 'bool-plus-input') selected @endif value="bool-plus-input">Compound Yes Or No</option>
                                           <option @if($qualifier->responseType == 'multiple') selected @endif value="multiple">Multiple Choice</option>
                                           <option @if($qualifier->responseType == 'text') selected @endif value="text">Text Input</option>
                                           <option @if($qualifier->responseType == 'number') selected @endif value="number">Number Input</option>
                                       </select>
                                    </div>
                                    <div id="answers_field" class="col-12 form-group d-none">
                                        <label for="">Acceptable Answers ( <small class="text-danger">Separate answers with comma </small> ):</label>
                                        <textarea placeholder=""
                                         name="possible_answers" value="{{$qualifier->possible_answers}}" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                    <div class="col-6 form-group">
                                        <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="nullable"
                                      id="flexCheckChecked" @if($qualifier->nullable == 1) checked @endif required>
                                      <label class="form-check-label" for="flexCheckChecked">
                                          Nullable ?
                                      </label>
                                      </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary">Save Changes</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
        @endforeach

            </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong><a href="">Pyramid Systems</a>.</strong>
    All rights reserved.

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  //$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if($title == 'Reports')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/7.2.1/d3.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.23.0/pivot.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.23.0/c3_renderers.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.23.0/d3_renderers.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.23.0/tips_data.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.23.0/export_renderers.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.23.0/gchart_renderers.min.js" ></script>

<script src="https://www.gstatic.com/charts/loader.js"></script>

@endif
<!-- <script type="text/javascript">
  $(document).ready(function () {
    function disableBack() {window.history.forward()}

    window.onload = disableBack();
    window.onpageshow = function (evt) {if (evt.persisted) disableBack()}
});
</script> -->
{{-- <script src="lib/DataTable/jquery.dataTables.min.js"></script>
<script src="lib/DataTable/jszip.min.js"></script>
<script src="lib/DataTable/dataTables.buttons.min.js"></script>
<script src="lib/DataTable/buttons.print.js"></script>
<script src="lib/DataTable/buttons.html5.min.js"></script>
<script src="lib/DataTable/buttons.flash.min.js"></script> --}}

</body>
</html>
