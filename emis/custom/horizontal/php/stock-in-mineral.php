<?php
	include('./config.php');
	if(isset($_POST['mineral_ca']) && isset($_POST['mineral_na']) && isset($_POST['mineral_mg']))
	{
		
		$sql="SELECT * from minerals";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			$row = $result->fetch_assoc();
			
			//echo "<script>alert('a')</script>";
			
			//((int)$total_packs) +((int)$row['total_packs']);
			
			$mineral_ca= ((int)$_POST['mineral_ca']) +((int)$row['ca']);
			$mineral_na= ((int)$_POST['mineral_na']) +((int)$row['na']);
			$mineral_mg= ((int)$_POST['mineral_mg']) +((int)$row['mg']);
			$mineral_ci= ((int)$_POST['mineral_ci']) +((int)$row['ci']);
			$mineral_so4= ((int)$_POST['mineral_so4']) +((int)$row['so4']);
			$mineral_k= ((int)$_POST['mineral_k']) +((int)$row['k']);
			$mineral_hco3= ((int)$_POST['mineral_hco3']) +((int)$row['hco3']);
			$mineral_anti_scaling= ((int)$_POST['mineral_anti_scaling']) +((int)$row['anti_scaling']);
		
			//$sql="INSERT INTO bottles (liters,total_packs,total_caps_pack,total_caps,total_empty,total_filled,rtg,gate_out,total_labels) 
			//	VALUES ('$liters', $total_packs, $total_caps_pack, $total_caps, $total_empty, $total_filled, $rtg, $gate_out, $total_labels)";
			
			$sql="UPDATE minerals set ca=$mineral_ca ,na=$mineral_na, mg=$mineral_mg , ci=$mineral_ci ,so4=$mineral_so4 ,k=$mineral_k ,hco3=$mineral_hco3, anti_scaling=$mineral_anti_scaling ";
				
			if (mysqli_query($conn, $sql)) 
			{
				echo "Stock Updated Successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			
		}
		else
		{
			echo "Error";
			return;	
		}
	}
?>