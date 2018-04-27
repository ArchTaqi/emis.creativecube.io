<?php
//$con=mysqli_connect("192.169.82.14","alahbabg_numan","ahbab123!@#","alahbabg_survey");
$con = mysqli_connect("premium43.web-hosting.com","roarepfq_db","Haier123!@#","roarepfq_wp999");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
date_default_timezone_set("Asia/Karachi");
$response = array();
 
if($_SERVER['REQUEST_METHOD']=='POST')
{
        $formNo = $_POST['formNo'];
        $id = $_POST['id'];
	$ans1 = $_POST['ans1'];
	$ans2 = $_POST['ans2'];
    	$ans3 = $_POST['ans3'];
    	$ans4 = $_POST['ans4'];
    	$lati = $_POST['lati'];
    	$longi = $_POST['longi'];
    	
    	
$QRY="";
    if($formNo=="form 1")
    {
        $ans5 = $_POST['ans5'];
        $QRY = "INSERT INTO form1survey (email,ans1 ,ans2, ans3, ans4, ans5, lati, longi) VALUES ('$id','$ans1','$ans2', '$ans3', '$ans4','$ans5', '$lati','$longi');";
    }
    else if($formNo=="form 2")
    {
        $ans5 = $_POST['ans5'];
        $QRY = "INSERT INTO form2survey (email,ans1 ,ans2, ans3, ans4, ans5, lati, longi) VALUES ('$id','$ans1','$ans2', '$ans3', '$ans4','$ans5', '$lati','$longi');";
    }
    else if($formNo=="form 3")
    {
        $ans5 = $_POST['ans5'];
        $ans6 = $_POST['ans6'];
        $ans7 = $_POST['ans7'];
        $ans8 = $_POST['ans8'];
        $ans9 = $_POST['ans9'];
        $ans10 = $_POST['ans10'];
        $QRY = "INSERT INTO form3survey (email,ans1 ,ans2, ans3, ans4, ans5, ans6, ans7, ans8, ans9, ans10, lati, longi) VALUES ('$id','$ans1','$ans2', '$ans3', '$ans4','$ans5','$ans6','$ans7','$ans8','$ans9','$ans10', '$lati','$longi');";
    }
    else if($formNo=="form 4")
    {
        $ans5 = $_POST['ans5'];
        $ans6 = $_POST['ans6'];
        $ans7 = $_POST['ans7'];
        $ans8 = $_POST['ans8'];
        $ans9 = $_POST['ans9'];
        $QRY = "INSERT INTO form4survey (email,ans1 ,ans2, ans3, ans4, ans5, ans6, ans7, ans8, ans9, lati, longi) VALUES ('$id','$ans1','$ans2', '$ans3', '$ans4','$ans5','$ans6','$ans7','$ans8','$ans9','$lati','$longi');";
    }
    else if($formNo=="form 5")
    {
        $ans5 = $_POST['ans5'];
        $QRY = "INSERT INTO form5survey (email,ans1 ,ans2, ans3, ans4, ans5, lati, longi) VALUES ('$id','$ans1','$ans2', '$ans3', '$ans4','$ans5', '$lati','$longi');";
    }
    else if($formNo=="form 6")
    {
         $ans5 = $_POST['ans5'];
        $QRY = "INSERT INTO form6survey (email,ans1 ,ans2, ans3, ans4, ans5, lati, longi) VALUES ('$id','$ans1','$ans2', '$ans3', '$ans4','$ans5','$lati','$longi');";
    }
    else if($formNo=="form 7")
    {
	$ans4 = $_POST['ans4'];
        $ans5 = $_POST['ans5'];
        $ans6 = $_POST['ans6'];
        $ans7 = $_POST['ans7'];

        $QRY = "INSERT INTO form7survey (email,ans1 ,ans2, ans3, ans4 ,ans5, ans6, ans7, lati, longi) VALUES ('$id','$ans1','$ans2', '$ans3','$ans4','$ans5', '$ans6','$ans7', '$lati', '$longi');";
    }
    else if($formNo=="form 8")
    {
    	$ans4 = $_POST['ans4'];
        $ans5 = $_POST['ans5'];
        $ans6 = $_POST['ans6'];
        $ans7 = $_POST['ans7'];
        $ans8 = $_POST['ans8'];
        $ans9 = $_POST['ans9'];

        
        $QRY = "INSERT INTO form8survey (email,ans1 ,ans2, ans3, ans4, ans5, ans6, ans7, ans8, ans9, lati, longi) VALUES ('$id','$ans1','$ans2', '$ans3', '$ans4', '$ans5', '$ans6', '$ans7', '$ans8', '$ans9', '$lati', '$longi');";
        
    }
    else if($formNo=="form 9")
    {
    	$ans4 = $_POST['ans4'];
        $ans5 = $_POST['ans5'];
        $ans6 = $_POST['ans6'];
        $ans7 = $_POST['ans7'];
        $ans8 = $_POST['ans8'];
        $ans9 = $_POST['ans9'];
        
	$QRY = "INSERT INTO form9survey (email,ans1 ,ans2, ans3, ans4, ans5, ans6, ans7, ans8, ans9, lati, longi) VALUES ('$id','$ans1','$ans2', '$ans3', '$ans4', '$ans5', '$ans6', '$ans7', '$ans8', '$ans9', '$lati', '$longi');";
        
    }
    else if($formNo=="form 10")
    {
    	$ans4 = $_POST['ans4'];
        $ans5 = $_POST['ans5'];
        $ans6 = $_POST['ans6'];
        $ans7 = $_POST['ans7'];
        $ans8 = $_POST['ans8'];
      
        
	$QRY = "INSERT INTO form10survey (email,ans1 ,ans2, ans3, ans4, ans5, ans6, ans7, ans8, lati, longi) VALUES ('$id','$ans1','$ans2', '$ans3', '$ans4', '$ans5', '$ans6', '$ans7', '$ans8', '$lati', '$longi');";
        
    }
    else if($formNo=="form 11")
    {
        $ans5 = $_POST['ans5'];
        $ans6 = $_POST['ans6'];
        $ans7 = $_POST['ans7'];
        $ans8 = $_POST['ans8'];
        $ans9 = $_POST['ans9'];
        $ans10 = $_POST['ans10'];
        $QRY = "INSERT INTO form11survey (email,ans1 ,ans2, ans3, ans4, ans5, ans6, ans7,  ans8, ans9, ans10,lati, longi) VALUES ('$id','$ans1','$ans2', '$ans3', '$ans4', '$ans5', '$ans6', '$ans7', '$ans8', '$ans9', '$ans10','$lati','$longi');";
    }
  else if($formNo=="form 12")
    {
        $ans5 = $_POST['ans5'];
        $ans6 = $_POST['ans6'];
        $ans7 = $_POST['ans7'];
        $ans8 = $_POST['ans8'];
        $ans9 = $_POST['ans9'];
        $ans10 = $_POST['ans10'];
        $ans11 = $_POST['ans11'];
        $ans12 = $_POST['ans12'];
        $ans13 = $_POST['ans13'];
        $QRY = "INSERT INTO form12survey (email,ans1 ,ans2, ans3, ans4, ans5, ans6, ans7,  ans8, ans9, ans10, ans11, ans12, ans13,lati, longi) VALUES ('$id','$ans1','$ans2', '$ans3', '$ans4', '$ans5', '$ans6', '$ans7', '$ans8', '$ans9', '$ans10', '$ans11', '$ans12', '$ans13','$lati','$longi');";
    }
    
    $QRY.="INSERT INTO locations (cnic,formNo,lati,longi) VALUES('$id','$formNo','$lati','$longi')";   
    
if (mysqli_multi_query($con, $QRY)) 
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