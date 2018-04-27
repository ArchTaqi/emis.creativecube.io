<?php include('master-header.php');?>

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
	
	
    <div class="row">
		<?php
			include('config.php');
			
			$sql="SELECT COUNT(*) from orders";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
				while( $row = mysqli_fetch_array($result))
				{
					echo "<div class='col-lg-3 col-md-12'><div class='card'><div class='card-body'><div class='d-flex flex-row'><div class='round align-self-center round-success'><i class='ti-wallet'></i></div><div class='m-l-10 align-self-center'><h3 class='m-b-0'>Orders</h3><h5 class='text-muted m-b-0'>Total orders: ".$row[0]."</h5></div></div></div></div></div>";
				}
			}

			
			$sql="SELECT COUNT(*) from clients";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
				while( $row = mysqli_fetch_array($result))
				{
					echo "<div class='col-lg-3 col-md-12'><div class='card'><div class='card-body'><div class='d-flex flex-row'><div class='round align-self-center round-info'><i class='ti-user'></i></div><div class='m-l-10 align-self-center'><h3 class='m-b-0'>Clients</h3><h5 class='text-muted m-b-0'>Total Clients: ".$row[0]."</h5></div></div></div></div></div>";
				}
			}
			
			
			$sql="SELECT COUNT(*) from employees";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
				while( $row = mysqli_fetch_array($result))
				{
					echo "<div class='col-lg-3 col-md-12'><div class='card'><div class='card-body'><div class='d-flex flex-row'><div class='round align-self-center round-info'><i class='ti-user'></i></div><div class='m-l-10 align-self-center'><h3 class='m-b-0'>Employees</h3><h5 class='text-muted m-b-0'>Total Employees: ".$row[0]."</h5></div></div></div></div></div>";
				}
			}
			
			
		?>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-danger"><i class="ti-calendar"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0"><?php date_default_timezone_set("Asia/Karachi"); echo date('F Y'); ?></h3>
                        <h5 class="text-muted m-b-0">Date</h5></div>
                </div>
            </div>
        </div>
    </div>

    </div>
	
	
    <div class="row">
        <!-- Column -->
		<?php
			include('config.php');
			
			$sql="SELECT * from bottles";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
				while( $row = mysqli_fetch_array($result))
				{
					echo "<div class='col-lg-4 col-md-6'><div class='card'><div class='card-body'><h3 class='card-title'>".$row['liters']."</h3><div class='text-left'> <span class='text-muted'>Stock In</span><div class='col-sm-12' style='text-align:right;'><h5 class='font-light'>Total Packs: <b>".$row['total_packs']."qty</b></h5><h5 class='font-light'>Total Caps Pack: <b>".$row['total_caps_pack']."qty</b></h5><h5 class='font-light'>Total Caps: <b>".$row['total_caps']."qty</b></h5><h5 class='font-light'>Total Empty: <b>".$row['total_empty']."qty</b></h5><h5 class='font-light'>Total Filled: <b>".$row['total_filled']."qty</b></h5><h5 class='font-light'>RTG: <b>".$row['rtg']."qty</b></h5><h5 class='font-light'>Gate Out: <b>".$row['gate_out']."qty</b></h5><h5 class='font-light'>Total Labels: <b>".$row['total_labels']."qty</b></h5></div></div></div></div></div>";
				}
			}
																		
					
		?>
    </div>

<?php
	include('master-footer.php');
?>