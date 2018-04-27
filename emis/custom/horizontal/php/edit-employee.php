<?php
	//echo "<script>alert('hello');</script>";		
include "../config.php";

	$emp_name="";
	$phone_number="";
	$email="";
	$id_number="";
	$employed_date="";
	$refered_by="";
	$ref_number="";
	$remarks="";
	if(isset($_POST['employee_ids']))
	{
		$employee_id = $_POST['employee_id'];
		$sql="SELECT * from employees WHERE id=$employee_id";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			$row = $result->fetch_assoc();
			$emp_name=$row['employed_name'];
			$phone_number=$row['phone_number'];
			$email=$row['email'];
			$id_number=$row['id_number'];
			$employed_date=$row['employed_date'];
			$refered_by=$row['refered_by'];
			$ref_number=$row['ref_number'];
			$remarks=$row['remarks'];
		}
	}
		
		
		$conn->close();
?>