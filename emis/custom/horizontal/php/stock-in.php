<?php
	include('./config.php');
	if(isset($_POST['total_packs']) && isset($_POST['total_caps_pack']))
	{
		$liters=$_POST['liters'];	
		$sql="SELECT * from bottles WHERE liters='$liters'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			$row = $result->fetch_assoc();
			
			//echo "<script>alert('a')</script>";
			
			//((int)$total_packs) +((int)$row['total_packs']);
			
			$total_packs=((int)$_POST['total_packs']) +((int)$row['total_packs']);
			$total_caps_pack=((int)$_POST['total_caps_pack']) +((int)$row['total_caps_pack']);
			$total_caps=((int)$_POST['total_caps']) +((int)$row['total_caps']);
			
			$total_empty=((int)$_POST['total_empty']) +((int)$row['total_empty']);
			$total_filled=((int)$_POST['total_filled']) +((int)$row['total_filled']);
			$rtg=((int)$_POST['rtg']) +((int)$row['rtg']);
			$gate_out=((int)$_POST['gate_out']) +((int)$row['gate_out']);
			$total_labels=((int)$_POST['total_labels']) +((int)$row['total_labels']);
		
			//$sql="INSERT INTO bottles (liters,total_packs,total_caps_pack,total_caps,total_empty,total_filled,rtg,gate_out,total_labels) 
			//	VALUES ('$liters', $total_packs, $total_caps_pack, $total_caps, $total_empty, $total_filled, $rtg, $gate_out, $total_labels)";
			
			$sql="UPDATE bottles set total_packs=$total_packs ,total_caps_pack=$total_caps_pack, total_caps=$total_caps , total_empty=$total_empty ,total_filled=$total_filled ,rtg=$rtg ,gate_out=$gate_out ,total_labels=$total_labels WHERE liters='$liters'";
				
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