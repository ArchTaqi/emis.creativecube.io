<?php 
    //$con = mysqli_connect("premium43.web-hosting.com","roarepfq_db_survey","Haier123!@#","roarepfq_db_survey");
	$con = mysqli_connect("premium43.web-hosting.com","roarepfq_db","Haier123!@#","roarepfq_wp999");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else 
		echo "connected";
?>