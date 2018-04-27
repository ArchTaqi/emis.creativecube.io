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
        $QRY = $_POST['query'];
        
        //$QRY = str_replace('&', ';', $QRY);
        
        $text =explode("&",$QRY);
	
	print_r($text);
		
		for($i=0 ; $i<(sizeof($text))-1 ; $i++)
		{
			if (mysqli_query($con, $text[$i])) 
			{
		    		$response['error']=true;
		    		$response['message']="New record created successfully";
			}
			else
			{
				$response['error']=false;
	    			$response['message']="Error: " . $QRY . "<br>" . mysqli_error($con) . "lllppppccc";
	    		
			}
		
		}
	
	
	
	/*
	if (mysqli_multi_query($con, $QRY)) 
	{
    		$response['error']=true;
    		$response['message']="New record created successfully";
	} 
	else 
	{
    		$response['error']=false;
    		$response['message']="Error: " . $QRY . "<br>" . mysqli_error($con) . "lllppppccc";
    	}
    	*/

}
else
{
    $response['error']=true;
    $response['message']='You are not authorized';
}
echo json_encode($response);
mysqli_close($con); 

?>