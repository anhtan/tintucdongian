<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sim CMS - Design by Truong Tan</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'public/admin'; ?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Generic page styles -->
    <link rel="stylesheet" href="<?php echo base_url().'public/upload_jquery/'; ?>css/style.css">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="<?php echo base_url().'public/upload_jquery/'; ?>css/jquery.fileupload.css">
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url().'public/admin'; ?>/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo base_url().'public/admin'; ?>/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url().'public/admin'; ?>/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Select CSS -->
    <link href="<?php echo base_url().'public/admin'; ?>/dist/css/bootstrap-select.css" rel="stylesheet">

    <link href="<?php echo base_url().'public/admin'; ?>/dist/css/custom.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url().'public/admin'; ?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">


    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url().'public/admin'; ?>/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- tag input -->
    <link href="<?php echo base_url().'public/tagsinput'; ?>/src/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url().'public/admin'; ?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">Sim CMS |</a>
            <p class="mess_admin"> <?php if(isset($_SESSION['permiss'])){ echo $_SESSION['permiss'];} ?> <span><?php echo $_SESSION['users_name']; ?></span></p>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">

            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="<?php echo base_url_admin().'users/userInfo'; ?>"><i class="fa fa-user fa-fw"></i> Tài khoản</a>
                    </li>
                    <?php if($_SESSION['users_group_id'] == 1): ?>
                    <li><a href="<?php echo base_url_admin().'dashboard/configSystem'; ?>"><i class="fa fa-gear fa-fw"></i> Thiết lập</a>
                    </li>
                    <?php endif; ?>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url_admin()."dashboard/logout"; ?>"><i class="fa fa-sign-out fa-fw"></i> Thoát</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

