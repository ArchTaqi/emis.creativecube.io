<?php echo message_box('success'); ?>
<?php echo message_box('error');
$created = can_action('101', 'created');
$edited = can_action('101', 'edited');
$deleted = can_action('101', 'deleted');
?>
<?php
    $user_id = $this->session->userdata('user_id');
    $profile_info = $this->db->where('user_id', $user_id)->get('tbl_account_details')->row();
    $user_info = $this->db->where('user_id', $user_id)->get('tbl_users')->row();
    ?>
	
<?php
	$con=mysqli_connect("192.169.82.14","alahbabg_numan","ahbab123!@#","alahbabg_survey");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else
	{
		if( isset($_POST['list']) )
		{
			$sql=$_POST['list']."";
			
			if (mysqli_multi_query($con, $sql)) {
				echo "Forms Verified Successfully!!!";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
			exit;
			$con->close();
		}
	}
?>
	
<head>
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
	
	<script>
		$(document).ready(function()
		{
			$("#uploadForm").on('submit',(function(e) {
				e.preventDefault();
				
				var MyRows = $('table#DataTables').find('tbody').find('tr');
				if(MyRows.length>1)
				{
					document.getElementById("msgItemUpdate").innerHTML="Processing...";	
					var sql="";
					for(var i=0;i<MyRows.length;i++)
					{
						var vari=$(MyRows[i]).find("td:eq(8) select").val();
						var id=MyRows[i].cells.item(0).innerHTML;
						sql+="UPDATE "+$('#formTitleH3').data('myval')+" set isVerified='"+vari+"' WHERE id="+id+";";
						/*
						if($("input[name='r"+MyIndexValue+"'][value='1']").prop("checked"))
						{
							remarks=$(MyRows[i]).find("td:eq(5) input[type='text']").val();
							sql+="INSERT INTO employees_attendance (employee_id, status, remarks,date) VALUES ("+MyIndexValue+", 'P','"+remarks+"','"+today+"');";
							//alert("checked");	
						}
						else
						{
							remarks=$(MyRows[i]).find("td:eq(5) input[type='text']").val();
							sql+="INSERT INTO employees_attendance (employee_id, status, remarks,date) VALUES ("+MyIndexValue+", 'A','"+remarks+"','"+today+"');";
							//alert("Un-checked");	
						}
						*/
						//alert($(MyRows[i]).find("td:eq(8) select").val());
						//alert(MyRows[i].cells.item(0).innerHTML);
					}
					$.ajax({
						type: "POST",
						url: "location",
						data:{
							'list': sql
						},
						success: function(data) {
							$("#DataTables tr").remove();
							document.getElementById("msgItemUpdate").innerHTML=data;
						},
						error: function(data) {
							//alert(data['error']);
						}
					});			
				}
				else
				{
					document.getElementById("msgItemUpdate").innerHTML="Error: Select Form No.";
				}
				
				
			}));
		});
	</script>
</head>

	<div class="col-sm-4 col-sm-offset-2">
		<form method="POST" action="location" >
			<select class="form-control selectpicker" name="formNo" onchange="this.form.submit()" id="" data-live-search="true">
				<option>Select Form No</option>
				<option value="form1survey">Form 1</option>
				<option value="form2survey">Form 2</option>
				<option value="form3survey">Form 3</option>
				<option data-tokens="Form 4">Form 4</option>
				<option data-tokens="Form 5">Form 5</option>
				<option data-tokens="Form 6">Form 6</option>
				<option data-tokens="Form 7">Form 7</option>
				<option data-tokens="Form 8">Form 8</option>
			</select>
		</form>
	</div>
<div class="col-sm-4">
	<select class="form-control selectpicker" id="select-country" data-live-search="true">
		<?php
				$con=mysqli_connect("192.169.82.14","alahbabg_numan","ahbab123!@#","alahbabg_survey");
				
				if (mysqli_connect_errno())
				  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }
				else
				{
					$sql_u = "SELECT * FROM register WHERE head=".$user_id;
				 
					$res_u = mysqli_query($con, $sql_u);
					if (mysqli_num_rows($res_u) > 0) {
				  
						  while($row = $res_u->fetch_assoc())
						  {
							  echo "<option data-tokens='".$row['username']."'>".$row['username']."</option>";
						  } 
					}
				}
				  mysqli_close($con);
				?>
	</select>
</div>
</br>
</br>
</br>
<div class="panel panel-custom" style="border: none;" data-collapsed="0">

    <div class="panel-heading">
        <div class="panel-title">
            <?php 
				if(isset($_POST['formNo']))
				{
					$formName=$_POST['formNo'];
					if($formName=="form1survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form One</h3>";
					else if($formName=="form2survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Two</h3>";	
					else if($formName=="form3survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Three</h3>";	
					else if($formName=="form4survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Four</h3>";	
					else if($formName=="form5survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Five</h3>";	
					else if($formName=="form6survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Six</h3>";	
					else if($formName=="form7survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Seven</h3>";	
					else if($formName=="form8survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Eight</h3>";	
					else if($formName=="form9survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Nine</h3>";	
					else if($formName=="form10survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Ten</h3>";	
					else if($formName=="form11survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Eleven</h3>";	
					else if($formName=="form12survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Twelve</h3>";	
					else if($formName=="form13survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Thirteen</h3>";	
					else if($formName=="form14survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Fourteen</h3>";	
					else if($formName=="form15survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Fifteen</h3>";	
					else if($formName=="form16survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Sixteen</h3>";	
					else if($formName=="form17survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Seventeen</h3>";	
					else if($formName=="form18survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Eighteen</h3>";	
					else if($formName=="form19survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Nineteen</h3>";	
					else if($formName=="form20survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Twenty</h3>";	
					else if($formName=="form21survey")
						echo "<h3 id='formTitleH3' data-myval='$formName'>Form Twenty One</h3>";	
					
				}
					
			?>
            <?php if (!empty($created)) { ?>
                <div class="pull-right hidden-print" style="padding-top: 0px;padding-bottom: 8px">
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- Table -->
    <div class="panel-body">
        <table class="table table-striped DataTables " id="DataTables" cellspacing="0" width="100%">
            <thead>
            <tr>
				<th>Id</th>
                <th>CNIC</th>
                <th>Ans One</th>
                <th>Ans Two</th>
                <th>Ans Three</th>
                <th>Ans Four</th>
                <th>Ans Five</th>
				<th>Date</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
				<?php
				$con=mysqli_connect("192.169.82.14","alahbabg_numan","ahbab123!@#","alahbabg_survey");

				// Check connection

				if (mysqli_connect_errno())
				  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }
				else
				{
					$sql_u="";
					if(isset($_POST['formNo']))
					{
						$formNo=$_POST['formNo'];
						$sql_u = "SELECT * FROM ".$formNo." INNER JOIN register on register.username=".$formNo.".email WHERE register.head=".$user_id;
						
						$res_u = mysqli_query($con, $sql_u);
						if (mysqli_num_rows($res_u) > 0) 
						{
							  while($row = $res_u->fetch_assoc())
							  {
								  echo "<tr>";
								  echo "<td>".$row["id"]."</td>";
								  echo "<td>".$row["email"]."</td>";
								  echo "<td>".$row["ans1"]."</td>";
								  echo "<td>".$row["ans2"]."</td>";
								  echo "<td>".$row["ans3"]."</td>";
								  echo "<td>".$row["ans4"]."</td>";
								  echo "<td>".$row["ans5"]."</td>";
								  echo "<td>".$row["date"]."</td>";
								  echo "<td><select class='form-control'>";
									if($row['isVerified']=='Verified')
									{ 
										echo '<option style=color:green;>Verified</option>';
										echo '<option style=color:red;>Not Verified</option>';
									}
									else
									{
										echo '<option style=color:red;>Not Verified</option>';
										echo '<option style=color:green;>Verified</option>';
									}
								  echo "</select>";
								  echo "</tr>";
							  } 
						}
					}
				}
				  mysqli_close($con);
				?>
            </tbody>
        </table>
		</br>
		<div style="padding:15px;">
			<p id="msgItemUpdate" style="font:bold 17px/15px exo,sans-serif; color:#26c6da; margin:0px; padding:0px;"></p>
		</div>
		<form id="uploadForm" method="POST">	
			<button class="btn">Submit</button>
		</form>									
    </div>
</div>