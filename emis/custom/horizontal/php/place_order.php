<?php
	//echo "<script>alert('hello');</script>";		
include "../config.php";

		$customer_id = $_POST['customer_id'];
		$quantity=$_POST['quantity'];
		$chicken_type=$_POST['chicken_type'];
		$total_price=$_POST['total_price'];
		$received_cash=$_POST['received_cash'];
		$return_cash=$_POST['return_cash'];
		$extra_cash=$_POST['extra_cash'];
		
		$sql="INSERT INTO orders (quantity,chicken_type,total_price,received_cash,return_cash,extra_cash,customer_id,date) 
			VALUES ($quantity,$chicken_type,$total_price,$received_cash,$return_cash, $extra_cash, $customer_id, CURDATE())";
		
		if (mysqli_query($conn, $sql)) 
		{
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
		$conn->close();
?>