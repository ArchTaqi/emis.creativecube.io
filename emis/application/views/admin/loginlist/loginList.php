<?php
	if(isset($_POST['list']))
	{
		$data=$_POST['list'];
		$query_bar=explode('|',$data);	
		for($i=0; $i<(sizeof($query_bar))-1; $i++)
		{
			$query_comma = explode(',',$query_bar[$i]);
			$cnic = $query_comma[0];
			$password = $query_comma[1];
			$fullname = $query_comma[2];
			$email = $query_comma[3];
			$head = $query_comma[4];
			
			$user_info = $this->db->where('username',"$cnic")->get('tbl_users')->row();
			if(sizeof($user_info)==0)
			{	
				$this->db->trans_start();
			
				$this->db->start_cache();
					
					$this->db->set('username',$cnic);
					$this->db->set('password`',hash('sha512', $password . config_item('encryption_key')));
					$this->db->set('email',$email);
					$this->db->set('role_id','3');
					$this->db->set('activated','1');
					$this->db->set('last_ip','::1');
					$this->db->set('modified',date("Y-m-d"));
					$this->db->set('permission', 'all');
					
					$this->db->insert('tbl_users');
					
					$insert_id = $this->db->insert_id();
					
					$this->db->stop_cache();
					$this->db->flush_cache();

					
					$this->db->start_cache();
					
					$this->db->set('user_id',$insert_id);
					$this->db->set('fullname',$fullname);
					$this->db->set('city','Bwp, Punjab');
					$this->db->set('locale','ur_PK');
					$this->db->set('language','english');
					$this->db->set('designations_id','2');
					$this->db->set('head',$head);
					$this->db->set('avatar','uploads/add.png');
					$this->db->set('direction','ltr');
					
					$this->db->insert('tbl_account_details');
					
					$this->db->stop_cache();
					$this->db->flush_cache();
					
					$this->db->trans_complete();
			}
			else
			{
				echo "Data Already Exists: ". $cnic ."<br>";
			}
		}
		echo "Data Inserted Successfully.<br>";
		
		exit;
		/*
		$conn = mysqli_connect("192.169.82.14","alahbabg_numan","ahbab123!@#","alahbabg_survey");
		  if (!$conn) {
			die('Connection failed ' . mysqli_error($conn));
		  }
		  
		$sql=$data;  
		if (mysqli_multi_query($conn, $sql)) {
			echo "App Credentials uploaded Successfully!!!";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		$conn->close();
		
		*/
		
		exit;
		
	}
?>

<html>
	<head>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css">
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://gyrocode.github.io/jquery-datatables-alphabetSearch/1.2.2/css/dataTables.alphabetSearch.css">
		<script type="text/javascript" src="https://gyrocode.github.io/jquery-datatables-alphabetSearch/1.2.2/js/dataTables.alphabetSearch.min.js"></script>

		<script>
			var oFileIn;
			var listData=[];
			var check=true;
			$(function() {
				oFileIn = document.getElementById('my_file_input');
				if(oFileIn.addEventListener) {
					oFileIn.addEventListener('change', filePicked, false);
				}
			});

			function dataInsert()
			{
				document.getElementById("msgItemUpdate").innerHTML="Processing...";
				var query="";
				//var query="";
				for(i=1;i<listData.length;i++)
				{
					//alert(listData[i][0]);
					//query+="INSERT INTO register(username,password,province,head) VALUES('"+listData[i][0]+"','"+listData[i][1]+"','"+listData[i][2]+"','"+listData[i][3]+"') ON DUPLICATE KEY UPDATE username='"+listData[i][0]+"', password='"+listData[i][1]+"' , province='"+listData[i][2]+"' , head='"+listData[i][3]+"'; ";
					
					//query.push(temp);
					query+=listData[i][0]+","+listData[i][1]+","+listData[i][2]+","+listData[i][3]+","+listData[i][4]+"|";
				}
				//alert(query);
				
						$.ajax({
							type: "POST",
							url: "credentials",
							data:{
								'list':query
							},
							success: function(data) {
								//alert(data);
								document.getElementById("msgItemUpdate").innerHTML=data;
							}
						});
			}

			function filePicked(oEvent) {
				// Get The File From The Input
				var oFile = oEvent.target.files[0];
				var sFilename = oFile.name;
				// Create A File Reader HTML5
				var reader = new FileReader();
				
				// Ready The Event For When A File Gets Selected
				reader.onload = function(e) {
					var data = e.target.result;
					var cfb = XLS.CFB.read(data, {type: 'binary'});
					var wb = XLS.parse_xlscfb(cfb);
					// Loop Over Each Sheet
					wb.SheetNames.forEach(function(sheetName) {
						// Obtain The Current Row As CSV
						var sCSV = XLS.utils.make_csv(wb.Sheets[sheetName]);   
						var data = XLS.utils.sheet_to_json(wb.Sheets[sheetName], {header:1});   
						listData=data;
						$.each(data, function( indexR, valueR ) {
							
							//alert(data[indexR][0]+" | "+ data[indexR][1]);
							var sRow = "<tr>";
							$.each(data[indexR], function( indexC, valueC ) {
								if(indexR==0)
								{
									sRow = sRow + "<th>" + valueC + "</th>";
								}
								else
								{
									sRow = sRow + "<td style='text-align:center;width:50%;'>" + valueC + "</td>";
								}
							});
							sRow = sRow + "</tr>";
							$("#my_file_output").append(sRow);
						});
						
						$("#submit").css("visibility", "visible");
					});
					
						
						
				};
				
				// Tell JS To Start Reading The File.. You could delay this if desired
				reader.readAsBinaryString(oFile);
			}


		</script>
	</head>
		
	<body style="background:none;">
		<div class="col-sm-4 col-sm-offset-4" style="margin-top:100px;">
			<input type="file" id="my_file_input"  class="form-control"/>
			</br>
			<button id="submit" style="margin-bottom:10px; visibility:hidden;" class="btn btn-default" onclick="dataInsert()">Submit</button>
			</br>
			<center><p id="msgItemUpdate" style="display:inline-block; font:bold 15px/17px exo,sans-serif; color:#26c6da; margin-right:5px;"></p></center>
		</div>
		<table id='my_file_output' class="table table-striped DataTables" style="outline:1px solid gray;" width="100%">
		
		</table>
			
	</body>
</html>

