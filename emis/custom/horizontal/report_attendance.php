
<?php include('master-header.php');?>
				<div class="row page-titles">
					<div class="col-md-5 col-8 align-self-center">
						<h3 class="text-themecolor m-b-0 m-t-0">Employee Today's Attendance</h3>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item active">Reports</li>
						</ol>
					</div>
				</div>
							
							<form action="report_attendance.php" method="POST">
								<div class="col-12">
									<div class="row">
											<div class="col-md-2"></div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">From</label>
                                                    <div class="col-md-9">
                                                        <input value="<?php echo date('Y-m-d'); ?>" type="date" name="from_date" class="form-control" required data-validation-required-message="This field is required"></div>
                                                </div>
                                            </div>
											<div class="col-md-1" style="margin-top:4px;">
													<button type="submit" class="btn btn-success">select</button>
                                            </div>
											
                                            <!--/span-->
                                        </div>
								</div>
							</form>	
								
							<div class="row">
								<div class="col-12">
									<div class="card">
										<div class="card-body">
											<div class="table-responsive m-t-40">
											<h3>Date: <?php if(isset($_POST['from_date'])){ echo $_POST['from_date'];}else{echo date('Y-m-d');}?></h3>
												<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>Employee ID</th>
															<th>Employee Name</th>
															<th>Phone Number</th>
															<th>Attendance Status</th>
															<th>Remarks</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th>Employee ID</th>
															<th>Employee Name</th>
															<th>Phone Number</th>
															<th>Attendance Status</th>
															<th>Remarks</th>
														</tr>
													</tfoot>
													<tbody id="companyData">
														<?php
																//echo "<script>alert('hello');</script>";		
															include "config.php";
															$today=date('Y-m-d');
															
															$sql = "SELECT * FROM employees";
															$result = $conn->query($sql);
															
															if(isset($_POST['from_date']))
															{
																$today=$_POST['from_date'];
																$sql = "SELECT * FROM employees_attendance WHERE date='$today'";
																$result1 = $conn->query($sql);
															}
															else
															{
																$sql = "SELECT * FROM employees_attendance WHERE date='$today'";
																$result1 = $conn->query($sql);	
															}
															
															if ($result->num_rows > 0) 
															{
																while( $row = mysqli_fetch_array($result))
																{
																	$status="NILL";
																	$remarks="NILL";
																	echo "<tr>";
																	echo "<td>".$row['id']."</td>";
																	echo "<td>".$row['employee_name']."</td>";
																	echo "<td>".$row['phone_number']."</td>";
																	while( $row1 = mysqli_fetch_array($result1))
																	{
																		if($row['id']==$row1['employee_id'])
																		{
																			$status=$row1['status'];
																			$remarks=$row1['remarks'];
																			break;
																		}
																	}
																	echo "<td>".$status."</td>";
																	echo "<td>".$remarks."</td>";
																			
																	echo "</tr>";
																}
															}
																$conn->close();			
																
																/*
																//$new_array[] = $row;
																			
																			$sql1 = "SELECT * FROM employees_attendance WHERE employee_id='$row[id]' AND date='$today'";
																			$result1 = $conn->query($sql1);
																			$status="";
																			$remarks="";
																			if ($result1->num_rows > 0) 
																			{
																				while( $row1 = mysqli_fetch_array($result1))
																				{
																					$status=$row1['status'];
																					$remarks=$row1['remarks'];
																				}
																			}
																			else
																			{
																				$status="Nill";		
																				$remarks="Nill";		
																			}
																			echo "<tr>";
																			echo "<td>".$row['id']."</td>";
																			echo "<td>".$row['employee_name']."</td>";
																			echo "<td>".$row['phone_number']."</td>";
																			echo "<td>".$status."</td>";
																			echo "<td>".$remarks."</td>";
																			echo "</tr>";
																			*/
															?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
				<script src="../assets/plugins/jquery/jquery.min.js"></script>
				<script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
				<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
				<!-- slimscrollbar scrollbar JavaScript -->
				<script src="js/jquery.slimscroll.js"></script>
				<!--Wave Effects -->
				<script src="js/waves.js"></script>
				<!--Menu sidebar -->
				<script src="js/sidebarmenu.js"></script>
				<!--stickey kit -->
				<script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
				<script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
				<!--Custom JavaScript -->
				<script src="js/custom.min.js"></script>
				<!-- This is data table -->
				<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
				<!-- start - This is for export functionality only -->
				<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
				<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
				<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
				<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
				<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
				<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
				<!-- end - This is for export functionality only -->
				<script>
				$(document).ready(function() {
					$('#myTable').DataTable();
					$(document).ready(function() {
						var table = $('#example').DataTable({
							"columnDefs": [{
								"visible": false,
								"targets": 2
							}],
							"order": [
								[2, 'asc']
							],
							"displayLength": 25,
							"drawCallback": function(settings) {
								var api = this.api();
								var rows = api.rows({
									page: 'current'
								}).nodes();
								var last = null;
								api.column(2, {
									page: 'current'
								}).data().each(function(group, i) {
									if (last !== group) {
										$(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
										last = group;
									}
								});
							}
						});
						// Order by the grouping
						$('#example tbody').on('click', 'tr.group', function() {
							var currentOrder = table.order()[0];
							if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
								table.order([2, 'desc']).draw();
							} else {
								table.order([2, 'asc']).draw();
							}
						});
					});
				});
				$('#example23').DataTable({
					dom: 'Bfrtip',
					buttons: [
						'copy', 'csv', 'excel', 'pdf', 'print'
					]
				});
				</script>
				<!-- ============================================================== -->
				<!-- Style switcher -->
				<!-- ============================================================== -->
				<script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
								<!-- Column -->
   <!-- ============================================================== -->
				<!-- Style switcher -->
				<!-- ============================================================== -->
				<script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
				<footer class="footer">
					&copy; 2018 Inventory Sys. by Alhabab Solutions
				</footer>
			
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>