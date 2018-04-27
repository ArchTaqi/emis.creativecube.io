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
	
	//echo "<h1>".$profile_info->designations_id."</h1>";
    ?>
	
<?php
	$con = mysqli_connect("premium43.web-hosting.com","roarepfq_db","Haier123!@#","roarepfq_wp999");
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
	<style>
	   #book-table{
	   	font-size:10px;
	   }
	</style>		
<head>
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
	
	
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

	<script type="text/javascript">

	
/*
{
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } 
*/

		$(document).ready(function() {
			var t=$('#book-table').DataTable({
				responsive: true});

                            t.order( [ t.columns().nodes().length-1, 'desc' ] ).draw();
		});
	</script>

	<script>
		$(document).ready(function()
		{
			$("#uploadForm").on('submit',(function(e) {
				e.preventDefault();
				
				var MyRows = $('table#book-table').find('tbody').find('tr');
				if(MyRows.length>0)
				{
					document.getElementById("msgItemUpdate").innerHTML="Processing...";	
					var sql="";
					for(var i=0;i<MyRows.length;i++)
					{
						var vari=$(MyRows[i]).find("td:eq("+(MyRows[i].cells.length-1)+") select").val();
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
						//alert(MyRows[i].cells.length);
					}
					$.ajax({
						type: "POST",
						url: "form_verification",
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
					document.getElementById("msgItemUpdate").innerHTML="Error: Select Form No";
				}
				
				
			}));
		});
	</script>
</head>

	<div class="col-sm-4 col-sm-offset-4">
		<form method="POST" action="form_verification" >
			<select class="form-control selectpicker" name="formNo" onchange="this.form.submit()" id="" data-live-search="true">
				<option>Select Form No</option>
				<option value="form1survey">Form One</option>
				<option value="form2survey">Form Two</option>
				<option value="form3survey">Form Three</option>
				<option value="form4survey">Form Four</option>
				<option value="form5survey">Form Five</option>
				<option value="form6survey">Form Six</option>
				<option value="form7survey">Form Seven</option>
				<option value="form8survey">Form Eight</option>
				<option value="form9survey">Form Nine</option>
				<option value="form10survey">Form Ten</option>
				<option value="form11survey">Form Eleven</option>
				<option value="form12survey">Form Tweleve</option>
			</select>
		</form>
	</div>
	<!--
<div class="col-sm-4">
	<select class="form-control selectpicker" id="select-country" data-live-search="true">
		<?php
			/*
				$con = mysqli_connect("premium43.web-hosting.com","roarepfq_db","Haier123!@#","roarepfq_wp999");
				
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
				  
				  */
		?>
	</select>
</div>
-->
</br>
</br>
</br>
<div class="panel panel-custom" style="border: none;" data-collapsed="0">

    <div class="panel-heading">	
		<div class="panel-title">
			<div class="pull-right">
			
				<p id="msgItemUpdate" style="display:inline-block; font:bold 13px/5px exo,sans-serif; color:#26c6da; margin-right:5px;"></p>
				
				 <form style="display:inline-block;" id="uploadForm" method="POST">	
					<button class="btn btn-primary">Update</button>
				</form>
				
			</div>
			
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
				else
					echo "<h3>Forms Verification</h3>";
					
			?>
                <div class="pull-right hidden-print" style="padding-top: 0px;padding-bottom: 8px">
                </div>
        </div>
    </div>
    <!-- Table -->
    <div class="panel-body">
        <table class="table table-striped DataTables" id="book-table" cellspacing="0" width="100%">
            <thead>
            <tr>
				<th>Id</th>
                <th>CNIC</th>
				<th>Ans One</th>
                <th>Ans Two</th>
                <th>Ans Three</th>
				<?php 
					
					if(isset($_POST['formNo']))
					{
						$formName=$_POST['formNo'];
						if($formName!="form7survey")
                				{
			                		echo "<th>Ans Four</th>";
			                	}
			                	
						if($formName!="form6survey" && $formName!="form7survey")
                				{
			                		echo "<th>Ans Five</th>";
			                	}
			                
						if($formName=="form3survey")
						{
							echo "<th>Ans Six</th>";
							echo "<th>Ans Seven</th>";
							echo "<th>Ans Eight</th>";
							echo "<th>Ans Nine</th>";
							echo "<th>Ans Ten</th>";
						}
						else if($formName=="form4survey")
						{
							echo "<th>Ans Six</th>";
							echo "<th>Ans Seven</th>";
							echo "<th>Ans Eight</th>";
							echo "<th>Ans Nine</th>";
						}
						else if($formName=="form9survey")
						{
							echo "<th>Ans Six</th>";
						}
						else if($formName=="form11survey" || $formName=="form8survey" || $formName=="form10survey")
						{
							echo "<th>Ans Six</th>";
							echo "<th>Ans Seven</th>";
							echo "<th>Ans Eight</th>";
						}
						else if($formName=="form12survey")
						{
							echo "<th>Ans Six</th>";
							echo "<th>Ans Seven</th>";
							echo "<th>Ans Eight</th>";
							echo "<th>Ans Nine</th>";
							echo "<th>Ans Ten</th>";
							echo "<th>Ans Eleven</th>";
							echo "<th>Ans Twelve</th>";
							echo "<th>Ans Thirteen</th>";
							echo "<th>Ans Fourteen</th>";
						}
					}
				?>
				<th>Lat</th>
				<th>Lng</th>
				<th>Date</th>
                <th>Status &nbsp;<i class="fa fa-sort" style="font-size:12px"></i></th>
            </tr>
            </thead>
            <tbody>
				<?php
				$con = mysqli_connect("premium43.web-hosting.com","roarepfq_db","Haier123!@#","roarepfq_wp999");

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
						$sql_u = "SELECT * FROM ".$formNo." INNER JOIN tbl_users on tbl_users.username=".$formNo.".email INNER join tbl_account_details on tbl_users.user_id=tbl_account_details.user_id WHERE tbl_account_details.head=".$user_id;
						if($profile_info->designations_id == 0)
						{
							$sql_u = "SELECT * FROM ".$formNo;
						}
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
								  
								  if($formName!="form7survey" )
								  {
								  	echo "<td>".$row["ans4"]."</td>";
								  }
								  if($formName!="form6survey" && $formName!="form7survey")
								  {
								  	echo "<td>".$row["ans5"]."</td>";
								  }
								  
								  if($formName=="form3survey" )
								  {
										echo "<td>".$row["ans6"]."</td>";
										echo "<td>".$row["ans7"]."</td>";
										echo "<td>".$row["ans8"]."</td>";
										echo "<td>".$row["ans9"]."</td>";
										echo "<td>".$row["ans10"]."</td>";
								  }
								  else if($formName=="form4survey" )
								  {
										echo "<td>".$row["ans6"]."</td>";
										echo "<td>".$row["ans7"]."</td>";
										echo "<td>".$row["ans8"]."</td>";
										echo "<td>".$row["ans9"]."</td>";
								  }
								  else if($formName=="form9survey")
								  {
		      								echo "<th>Ans Six</th>";
								  }	
								  else if($formName=="form11survey" || $formName=="form8survey" || $formName=="form10survey")
								  {
										echo "<td>".$row["ans6"]."</td>";
										echo "<td>".$row["ans7"]."</td>";
										echo "<td>".$row["ans8"]."</td>";
								  }
								  else if($formName=="form12survey" )
								  {
										echo "<td>".$row["ans6"]."</td>";
										echo "<td>".$row["ans7"]."</td>";
										echo "<td>".$row["ans8"]."</td>";
										echo "<td>".$row["ans9"]."</td>";
										echo "<td>".$row["ans10"]."</td>";
										echo "<td>".$row["ans11"]."</td>";
										echo "<td>".$row["ans12"]."</td>";
										echo "<td>".$row["ans13"]."</td>";
										echo "<td>".$row["ans14"]."</td>";
								  }
								  echo "<td>".$row["lati"]."</td>";
								  echo "<td>".$row["longi"]."</td>";							
								  echo "<td>".$row["date"]."</td>";
								  echo "<td><select class='form-control'>";
									if($row['isVerified']=='Verified')
									{ 
										echo '<option style=color:green; value="Verified" >Verified</option>';
										echo '<option style=color:red; value="Not Verified" >Not Verified</option>';
									}
									else
									{
										echo '<option style=color:red; value="Not Verified" >Not Verified</option>';
										echo '<option style=color:green; value="Verified" >Verified</option>';
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
    </div>
</div>