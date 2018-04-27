<?php echo message_box('success'); ?>
<?php echo message_box('error');
$created = can_action('101', 'created');
$edited = can_action('101', 'edited');
$deleted = can_action('101', 'deleted');
?>
<?php
    $user_id = $this->session->userdata('user_id');
    $profile_info = $this->db->where('user_id', $user_id)->get('tbl_account_details')->row();
    $user_info = $this->db->where('user_id', $user_id)->get('tbl_users')->row();
	
	//echo "<h1>".$profile_info->designations_id."</h1>";
	//echo "<h1>".$user_id."</h1>";
    $userRealId="";
?>

<html>
  	<style>
		#outer {
			display: table;
			position: absolute;
			height: 100%;
			width: 100%;
		}

		.middle {
			display: table-cell;
			vertical-align: middle;
		}

		.inner {
			margin-left: auto;
			margin-right: auto; 
			width: 400px; /*whatever width you want*/
		}

	</style>
	
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
	
	
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

	<script type="text/javascript">

		$(document).ready(function() {
			var t=$('#book-table').DataTable({
				responsive: true});
		});
		
		
	function userDetails(id)
	{
		window.location=id;
	}	
	</script>
		
<body>
<?php
	if($profile_info->designations_id!=2)
	{
		echo '<div class="col-sm-4 col-sm-offset-4" style="margin-top:20px; margin-bottom:20px;">';
		echo '<form method="POST" action="fieldperson_overview" >';
		echo '<select class="form-control selectpicker" name="usernameList" onchange="this.form.submit()" data-live-search="true">';
				$con = mysqli_connect("premium43.web-hosting.com","roarepfq_db","Haier123!@#","roarepfq_wp999");
				
				if (mysqli_connect_errno())
				  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }
				else
				{
					$sql_u = "SELECT user_id, username FROM tbl_users";
				 
					$res_u = mysqli_query($con, $sql_u);
					if (mysqli_num_rows($res_u) > 0) {
						
							  echo "<option>Select Field Person</option>";
						  while($row = $res_u->fetch_assoc())
						  {
							  echo "<option data-tokens='".$row['username']."'>".$row['username']."</option>";
						  } 
					}
				}
				  mysqli_close($con);
				
		echo '</select>';
		echo '</div>';
	}
?>
<div class="col-sm-12">
<?php
	
	$userId="";
	if($profile_info->designations_id==2)
	{	
		$userId="11";
	}
	else if(isset($_POST['usernameList']))
	{
		$userId=$_POST['usernameList'];
	}

	if($userId!="")
	{
                $userRealId = $this->db->where('username', $userId)->get('tbl_users')->row();

		$con = mysqli_connect("premium43.web-hosting.com","roarepfq_db","Haier123!@#","roarepfq_wp999");
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		else
		{
			$sql_u = "SELECT (SELECT COUNT(id) FROM form1survey WHERE email='$userId') as table1Count, 
						  (SELECT COUNT(id) FROM form2survey WHERE email='$userId') as table2Count,
						  (SELECT COUNT(id) FROM form3survey WHERE email='$userId') as table3Count,
						  (SELECT COUNT(id) FROM form4survey WHERE email='$userId') as table4Count,
						  (SELECT COUNT(id) FROM form5survey WHERE email='$userId') as table5Count,
						  (SELECT COUNT(id) FROM form6survey WHERE email='$userId') as table6Count,
						  (SELECT COUNT(id) FROM form7survey WHERE email='$userId') as table7Count,
						  (SELECT COUNT(id) FROM form8survey WHERE email='$userId') as table8Count,
						  (SELECT COUNT(id) FROM form9survey WHERE email='$userId') as table9Count,
                                                  (SELECT COUNT(id) FROM form10survey WHERE email='$userId') as table10Count,
                                                  (SELECT COUNT(id) FROM form11survey WHERE email='$userId') as table11Count,
                                                  (SELECT COUNT(id) FROM form12survey WHERE email='$userId') as table12Count";
					 
			//SELECT (SUM(email = '11') AS emailCount, SUM(isVerified = 'Verified') AS verifiedCount FROM form1survey WHERE email = '11')		 
			$res_u = mysqli_query($con, $sql_u);
			
			$sql_u = "SELECT (SELECT COUNT(id) FROM form1survey WHERE email='$userId' AND isVerified='Verified') as table1Count, 
						  (SELECT COUNT(id) FROM form2survey WHERE email='$userId' AND isVerified='Verified') as table2Count,
						  (SELECT COUNT(id) FROM form3survey WHERE email='$userId' AND isVerified='Verified') as table3Count,
						  (SELECT COUNT(id) FROM form4survey WHERE email='$userId' AND isVerified='Verified') as table4Count,
						  (SELECT COUNT(id) FROM form5survey WHERE email='$userId' AND isVerified='Verified') as table5Count,
						  (SELECT COUNT(id) FROM form6survey WHERE email='$userId' AND isVerified='Verified') as table6Count,
						  (SELECT COUNT(id) FROM form7survey WHERE email='$userId' AND isVerified='Verified') as table7Count,
						  (SELECT COUNT(id) FROM form8survey WHERE email='$userId' AND isVerified='Verified') as table8Count,
						  (SELECT COUNT(id) FROM form9survey WHERE email='$userId' AND isVerified='Verified') as table9Count,
						  (SELECT COUNT(id) FROM form10survey WHERE email='$userId' AND isVerified='Verified') as table10Count,
						  (SELECT COUNT(id) FROM form11survey WHERE email='$userId' AND isVerified='Verified') as table11Count,
						  (SELECT COUNT(id) FROM form12survey WHERE email='$userId' AND isVerified='Verified') as table12Count";
					 
			//SELECT (SUM(email = '11') AS emailCount, SUM(isVerified = 'Verified') AS verifiedCount FROM form1survey WHERE email = '11')		 
			$res_u_1 = mysqli_query($con, $sql_u);
			
			if (mysqli_num_rows($res_u) > 0) 
			{
                                echo '<table class="table table-striped DataTables" id="book-table" cellspacing="0" width="100%">';
                                echo "<th>User Id</th>";
                                echo "<th>Form Submissions</th>";
                                echo "<th>Form Verifications</th>"; 
                                $base = base_url();
				$counter=0;
				$row = mysqli_fetch_array($res_u,MYSQL_NUM);
				$row1 = mysqli_fetch_array($res_u_1,MYSQL_NUM);
				for($i=0;$i< mysqli_num_fields ($res_u) ;$i++)
				{
					echo "<tr style='cursor:pointer' onclick=userDetails('$base./admin/user/user_details/".$userRealId->user_id."')><td>".$userRealId->user_id."</td> <td>".$row[$i]."</td> <td>".$row1[$i]."</td></tr>";
					//echo "<a style='color:black;'href=$base./admin/user/user_details/$userRealId->user_id><div class='col-sm-3' style='padding:0px;cursor:pointer; box-shadow: 5px 5px 5px grey;margin:13px; background-color:#fafbfc;' ><center><h4 style='color:white;width:100%;padding:10px 15px;margin:0px; background-color:#00a680;'>Form No ".($i+1)."</h4></center><h5 style='padding-right:15px; text-align:right'>Total Form Submission: <b>".$row[$i]."</b></h5><h5 style='padding-right:15px; text-align:right'>Total Form Verifications: <b>".$row1[$i]."</b></h5></div></a>";
				}
				
				echo "</table>";
			}
		}
		mysqli_close($con);
	}
		
?>
	</div>
</body>
</html>



	