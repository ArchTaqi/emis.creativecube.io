<?php
	include("$base_url()".'\config.php');
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else
	{
		if( isset($_POST['list']) )
		{
			$sql=$_POST['list']."";
			
			if (mysqli_multi_query($con, $sql)) {
				echo "Forms Verified Successfully!!!";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
			$con->close();
		}
	}
?>