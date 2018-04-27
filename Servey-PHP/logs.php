<?php
//$con=mysqli_connect("192.169.82.14","alahbabg_numan","ahbab123!@#","alahbabg_survey");
$con = mysqli_connect("premium43.web-hosting.com","roarepfq_db","Haier123!@#","roarepfq_wp999");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$response = array();
 
if($_SERVER['REQUEST_METHOD']=='POST')
{
        
        $cnic = $_POST['cnic'];
	$status = $_POST['status'];
    	
    	$QRY="INSERT into logs(cnic,status) VALUES('$cnic','$status')";
	if (mysqli_query($con, $QRY)) 
	{
	    $response['error']=false;
	    $response['message']="New record created successfully";
	} else {
	    $response['error']=true;
	    $response['message']="Error: " . $QRY . "<br>" . mysqli_error($con) . "lllppppccc";
	}
	
	}
else
{
    $response['error']=true;
    $response['message']='You are not authorized';
}
echo json_encode($response);
mysqli_close($con); 


?>