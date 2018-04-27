<?php
//$con=mysqli_connect("192.169.82.14","alahbabg_numan","ahbab123!@#","alahbabg_survey");
$con = mysqli_connect("premium43.web-hosting.com","roarepfq_db","Haier123!@#","roarepfq_wp999");


// Check connection

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{
$temp = array();
  if ($_SERVER['REQUEST_METHOD']=='POST') {
  	$username = $_POST['username'];
  	$password = $_POST['password'];
  	//$tableName = $_POST['tableName'];

  //	$sql_u = "SELECT id FROM userLogin WHERE userName ='$username' AND password ='$password'";
          $password = sha1($password);
          
  	$sql_u = "SELECT user_id FROM tbl_users WHERE username ='$username' AND password ='$password'";
 
    
   
  	$res_u = mysqli_query($con, $sql_u);
  	if (mysqli_num_rows($res_u) > 0) {
  //	  $resultArray = "true";
  while($row = $res_u->fetch_assoc())
  {
      
      $temp['ID'] = $row["user_id"];
      $temp['status'] = 'true';
     // echo "id: " .$row["id"]."";
  }
  	  
      
      
	}
  	else{
           $resultArray = "false";
           $temp['status'] = 'false';
           $temp['PAss'] = $password;
           $temp['ID'] = $username;
           
           
  	}
  	
  }
}
  echo json_encode($temp);
  mysqli_close($con);
?>