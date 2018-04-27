<?php
	//echo "<script>alert('hello');</script>";		
include "../config.php";

		$sql = $_POST['query'];
		
		if (mysqli_multi_query($conn, $sql)) 
		{
			echo "Attendance Marked";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
		$conn->close();
?>