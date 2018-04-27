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
<head>
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
	
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

	
	<script type="text/javascript">
		$(document).ready(function() {
			$('#book-table').DataTable();
		});
	</script>
</head>

<div class="panel panel-custom" style="border: none;" data-collapsed="0">

    <div class="panel-heading">	
		<div class="panel-title">
			<div class="pull-right">
				
			</div>
			<h3>Logs</h3>
                <div class="pull-right hidden-print" style="padding-top: 0px;padding-bottom: 8px">
                </div>
        </div>
    </div>
    <!-- Table -->
    <div class="panel-body">
        <table class="table table-striped DataTables" id="book-table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>CNIC</th>
		<th>Status</th>
		<th>Date</th>
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
						$sql_u = "";
						if($profile_info->designations_id == 0)
						{
							$sql_u = "SELECT * FROM logs";
						}
						$res_u = mysqli_query($con, $sql_u);
						if (mysqli_num_rows($res_u) > 0) 
						{
							  while($row = $res_u->fetch_assoc())
							  {
								  echo "<tr>";
								  echo "<td>".$row["cnic"]."</td>";
								  echo "<td>".$row["status"]."</td>";
								  echo "<td>".$row["date"]."</td>";
								  
								  echo "</tr>";
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