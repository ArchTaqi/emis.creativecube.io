<?php
										/*
										include('config.php');
										$msg="";
										if(isset($_POST['user']) && isset($_POST['password']))
										{
											$user=$_POST['user'];
											$password=$_POST['password'];
											
											$sql="SELECT * from register WHERE user='$user' AND password='$password'";
											$result = $conn->query($sql);
											if ($result->num_rows > 0) 
											{
												setcookie("isLogin","yes");
												while( $row = mysqli_fetch_array($result)){
													setcookie("username",$row['user']);
												}
												
												header("Location: dashboard.php");
												
												die();
											}
											else
											{
												$msg="Wrong Username or Password";
											}												
										}
										*/
?>
									
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
                    <a style="color:white;" class="navbar-brand" href="index.php">
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
                    </ul>
                </div>
            </nav>
        </header>
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
		
				<div class="row">
					<div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <center><h3 class="card-title"><b>Welcome</b> to Inventory System</h3></center>
                                <center><h6 class="card-subtitle">Enter your credentials to Login!!!</h6></center>
                                <form method="POST" action="index.php" class="form p-t-20">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">User</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-email"></i></div>
                                            <input type="text" name="user" class="form-control" id="exampleInputEmail1" placeholder="User">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd1">Password</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                                            <input type="password" name="password" class="form-control" id="pwd1" placeholder="Password">
                                        </div>
                                    </div>
									<p style="color:red;"><?php echo $msg;?></p>		
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
				
	
	<?php include('master-footer.php');?>
</body>

</html>
