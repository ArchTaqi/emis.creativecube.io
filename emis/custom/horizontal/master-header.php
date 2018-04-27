<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    
	<link rel="icon" type="image/png" sizes="16x16" href="images/logo.png">
	
    <title>Inventory System</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>	
</head>

<body class="fix-header card-no-border logo-center">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a style="color:white;" class="navbar-brand" href="dashboard.php">
                        <!-- Logo icon -->
                        <b>
							<img src="images/logo.png" height="44px" width="55px" alt="homepage" class="light-logo" />
							INVENTORY
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
						SYSTEM	
                         <!-- dark Logo text -->
                         <!--<img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />-->
                         <!-- Light Logo text -->    
                         <!--<img src="../assets/images/logo-text.png" class="light-logo" alt="homepage" /></span> </a>-->
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                      
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                     
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                      
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="user">
							<div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li><a href="settings.php"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
							
                        </li>
						
						
                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img height="40px" width="40px" src="images/sign-in.png"></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        <li>
                            <a class="has-arrow" href="dashboard.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Bottles Inventory</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a onclick="pageSelect('19 Liter Bottle')" href="#">19 Liter Bottle</a></li>
                                <li><a onclick="pageSelect('6 Liter Bottle')" href="#">6 Liter Bottle</a></li>
                                <li><a onclick="pageSelect('1.5 Liter Bottle')" href="#">1.5 Liter Bottle</a></li>
                                <li><a onclick="pageSelect('0.6 Liter Bottle')" href="#">0.6 Liter Bottle</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Clients & Orders</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="new-client.php">New Client</a></li>
								<li><a href="order.php">Order</a></li>
								<li><a href="client-edit.php">Update Client Info</a></li>
								<li><a href="order-edit.php">Update Order Details</a></li>
                            </ul>
                        </li>
						<li>
                            <a class="has-arrow" href="generator.php" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Generator</span></a>
                        </li>
						<li>
                            <a class="has-arrow" href="plant.php" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Plant</span></a>
                        </li>
						<li>
                            <a class="has-arrow" href="mineral.php" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Minerals</span></a>
                        </li>
						<li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Employees</span></a>
							<ul aria-expanded="false" class="collapse">
                                <li><a href="employee.php">New Employee</a></li>
                                <li><a href="employee-attendance.php">Employees Attendance</a></li>
                                <li><a href="employee-performance.php">Employees Performance</a></li>
                                <li><a href="edit-employee.php">Update Employee Info</a></li>
                            </ul>
							
                        </li>
						<li>
                            <a class="has-arrow" href="lab.php" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Lab</span></a>
                        </li>
						
						<li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Reports</span></a>
							<ul aria-expanded="false" class="collapse">
								<li><a href="report_bottles.php">Bottles Report</a></li>
								<li style="margin-top:-15px;margin-bottom:-15px;"><hr></li>
								<li><a href="report_client.php">Clients Report</a></li>
								<li><a href="report_client_orders.php">Client Orders Report</a></li>
								<li style="margin-top:-15px;margin-bottom:-15px;"><hr></li>
								<li><a href="report_mineral.php">Minerals Report</a></li>
								<li style="margin-top:-15px;margin-bottom:-15px;"><hr></li>
								<li><a href="report_evaluation.php">Employees Evaluation</a></li>
								<li><a href="report_employees.php">Employees Information</a></li> 
								<li><a href="report_attendance.php">Employees Attendance</a></li>
								<li><a href="report_performance.php">Employees Performance</a></li>
								<li style="margin-top:-15px;margin-bottom:-15px;"><hr></li>
								<li><a href="report_generator.php">Generator Report</a></li>
								<li><a href="report_plant.php">Plant Report</a></li>
								<li><a href="report_lab.php">Lab Report</a></li>
								
								
                            </ul>
							
                        </li>
						
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                    <!-- Column -->
					
					
					
					
					
                    <?php //include "dashboard.php"?>
                    