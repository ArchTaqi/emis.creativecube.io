
<?php include('master-header.php');?>
				<div class="row page-titles">
					<div class="col-md-5 col-8 align-self-center">
						<h3 class="text-themecolor m-b-0 m-t-0">Minerals Report</h3>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item active">Reports</li>
						</ol>
					</div>
				</div>	
							<div class="row">
								<div class="col-12">
									<div class="card">
										<div class="card-body">
											<div class="table-responsive m-t-40">
												<h3>Date: <?php echo date('Y-m-d');?></h3>
												<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>Sr No</th>
															<th>Ca</th>
															<th>Na</th>
															<th>Mg</th>
															<th>Ci</th>
															<th>SO4</th>
															<th>K</th>
															<th>HCO3</th>
															<th>Anti Scaling</th>
															<th>Updated at</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th>Sr No</th>
															<th>Ca</th>
															<th>Na</th>
															<th>Mg</th>
															<th>Ci</th>
															<th>SO4</th>
															<th>K</th>
															<th>HCO3</th>
															<th>Anti Scaling</th>
															<th>Updated at</th>
														</tr>
													</tfoot>
													<tbody id="companyData">
														<?php
																//echo "<script>alert('hello');</script>";		
																include "config.php";
															
																$sql = "SELECT * FROM minerals";
																	
																	$result = $conn->query($sql);
																	if ($result->num_rows > 0) {
																		while( $row = mysqli_fetch_array($result)){
																			//$new_array[] = $row;
																			echo "<tr>";
																			echo "<td>1</td>";
																			echo "<td>".$row['ca']."</td>";
																			echo "<td>".$row['na']."</td>";
																			echo "<td>".$row['mg']."</td>";
																			echo "<td>".$row['ci']."</td>";
																			echo "<td>".$row['so4']."</td>";
																			echo "<td>".$row['k']."</td>";
																			echo "<td>".$row['hco3']."</td>";
																			echo "<td>".$row['anti_scaling']."</td>";
																			echo "<td>".$row['date']."</td>";
																			
																			echo "</tr>";
																		}
																	}
																$conn->close();
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
				<!-- Bootstrap tether Core JavaScript -->
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