<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>DENR - NCR Consumables Inventory System</title>
  <link rel="icon" href="<?php echo base_url() . "assets/"; ?>denr-emb-logo.gif" type="image/x-icon">

  <!-- Font Awesome Icons -->
  <!--  <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>plugins/fontawesome-free/css/all.min.css">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <!-- DataTable -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

  <!-- Table to CSV JQ -->
  <script src="<?php echo base_url() . "assets/"; ?>js/table2csv.js" type="text/javascript"></script>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>
      <!-- Left navbar links -->
      <ul class="nav navbar-nav ml-auto">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fas fa-user-tie nav-icon"></i>
            <?php echo $_SESSION['division']; ?>
          </a>
          <ul class="dropdown-menu">
            <li class="user-footer">
              <div class="pull-right">
                <a href="<?php echo base_url(); ?>logincontroller/logout" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->


      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="<?php echo base_url(); ?>dashboard" class="nav-link" class="d-block">DENR-NCR-CIS</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="https://denrncrsys.online/" class="nav-link">
                <i class="nav-icon fas fa-arrow-left"></i>
                <p>
                  DNIIS
                </p>
              </a>
            </li>


            <li class="nav-item">
              <a href="<?php echo base_url(); ?>dashboard" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <?php if ($_SESSION['division'] == 'AD-GSS') : ?>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-archive"></i>
                  <p>
                    Inventory Items
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>

                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>stock/list" class="nav-link" class="nav-link">
                      <i class="nav-icon fa fa-list"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>

                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>stock/add" class="nav-link" class="nav-link">
                      <i class="nav-icon fa fa-shopping-cart"></i>
                      <p>Purchasing</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php endif; ?>

            <?php if ($_SESSION['division'] == 'AD-GSS') : ?>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>approver" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                  <p>
                    Approver
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ris" class="nav-link">
                  <i class="nav-icon fa fa-list"></i>
                  <p>
                    RIS List
                  </p>
                </a>
              </li>
            <?php endif; ?>

            <li class="nav-item">
              <a href="<?php echo base_url(); ?>request" class="nav-link">
                <i class="nav-icon fa fa-shopping-cart"></i>
                <p>
                  Stock Request
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>