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
			
			$mineral_ca= ((int)$row['ca']) - ((int)$_POST['mineral_ca']);
			$mineral_na= ((int)$row['na']) - ((int)$_POST['mineral_na']);
			$mineral_mg= ((int)$row['mg']) - ((int)$_POST['mineral_mg']);
			$mineral_ci= ((int)$row['ci']) - ((int)$_POST['mineral_ci']);
			$mineral_so4= ((int)$row['so4']) - ((int)$_POST['mineral_so4']);
			$mineral_k= ((int)$row['k']) - ((int)$_POST['mineral_k']);
			$mineral_hco3= ((int)$row['hco3']) - ((int)$_POST['mineral_hco3']);
			$mineral_anti_scaling= ((int)$row['anti_scaling']) - ((int)$_POST['mineral_anti_scaling']);
		
			if($mineral_ca<0)
			{
				echo "Ca value is More than Stock Data";
				return;
			}
			else if($mineral_na<0)
			{
				echo "Na Pack value is More than Stock Data";
				return;
			}
			else if($mineral_mg<0)
			{
				echo "Mg value is More than Stock Data";
				return;
			}
			else if($mineral_ci<0)
			{
				echo "Ca value is More than Stock Data";
				return;
			}
			else if($mineral_so4<0)
			{
				echo "SO4 value is More than Stock Data";
				return;
			}
			else if($mineral_k<0)
			{
				echo "K value is More than Stock Data";
				return;
			}
			else if($mineral_hco3<0)
			{
				echo "HCO3 value is More than Stock Data";
				return;
			}
			else if($mineral_anti_scaling<0)
			{
				echo "Anti Scaling value is More than Stock Data";
				return;
			}
			//$sql="INSERT INTO bottles (liters,total_packs,total_caps_pack,total_caps,total_empty,total_filled,rtg,gate_out,total_labels) 
			//	VALUES ('$liters', $total_packs, $total_caps_pack, $total_caps, $total_empty, $total_filled, $rtg, $gate_out, $total_labels)";
			
			$sql="UPDATE minerals set ca=$mineral_ca ,na=$mineral_na, mg=$mineral_mg , ci=$mineral_ci ,so4=$mineral_so4 ,k=$mineral_k ,hco3=$mineral_hco3 , anti_scaling=$mineral_anti_scaling";
				
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