<!DOCTYPE html>
<html lang="en">
<head>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script>
		$(document).ready(function()
		{
			$("#uploadForm").on('submit',(function(e) {
				e.preventDefault();
				
				var MyRows = $('table#example23').find('tbody').find('tr');
				if(MyRows.length>1)
				{
					document.getElementById("msgItemUpdate").innerHTML="Processing...";	
					var sql="";
					for(var i=0;i<MyRows.length;i++)
					{
						var MyIndexValue = $(MyRows[i]).find('td:eq(0)').text();
						
						var today = new Date();
						var dd = today.getDate();
						var mm = today.getMonth()+1; //January is 0!

						var yyyy = today.getFullYear();
						if(dd<10){
							dd='0'+dd;
						} 
						if(mm<10){
							mm='0'+mm;
						} 
						var today = yyyy+'-'+mm+'-'+dd;
						
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
					}
				
					$.ajax({
						type: "POST",
						url: "php/attendance.php",
						data:{
							'query': sql,
						},
						success: function(data) {
							$("#example23 tr").remove();
							document.getElementById("msgItemUpdate").innerHTML=data;
						},
						error: function(data) {
							//alert(data['error']);
						}
					});	
				}
				else
				{
					document.getElementById("msgItemUpdate").innerHTML="Today's Attendance already Marked";
				}
				
				
			}));
		});
	</script>
</head>

<body class="fix-header card-no-border logo-center">
	<?php include('master-header.php');?>	
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Employee Attendance</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Attendance</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
  
  
								<form id="uploadForm" method="POST" class="form-horizontal">
                                    <div class="form-body">
                                        <h3 class="box-title">Employee Attendance</h3>
                                        <hr class="m-t-0 m-b-40">
                                        
										<div class="table-responsive m-t-40">
											<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>Employee Id</th>
															<th>Name</th>
															<th>Phone Number</th>
															<th>Date</th>
															<th>Attendance</th>
															<th>Remarks</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th>Employee Id</th>
															<th>Name</th>
															<th>Phone Number</th>
															<th>Date</th>
															<th>Attendance</th>
															<th>Remarks</th>
														</tr>
													</tfoot>
													<tbody id="companyData">
														<?php		
															include "config.php";					
																		
																$todayDate=date('Y-m-d');
																$sql1 = "SELECT * FROM employees_attendance WHERE date='$todayDate'";
																$result1 = $conn->query($sql1);
																if ($result1->num_rows > 0) 
																{
																	echo "<tr>Today's Attendance already Marked</tr>";
																}
																else
																{																	
																	$sql = "SELECT * FROM employees";
																	$result = $conn->query($sql);
																	if ($result->num_rows > 0) {
																		while( $row = mysqli_fetch_array($result)){
																			//$new_array[] = $row;
																			echo "<tr>";
																			//echo "<td>".$row['id']."</td>";
																			echo "<td>".$row['id']."</td>";
																			echo "<td>".$row['employee_name']."</td>";
																			echo "<td>".$row['phone_number']."</td>";
																			echo "<td>".date('Y-m-d')."</td>";
																			echo "<td><div class='radio-list'><label class='custom-control custom-radio'><input value='1' name='r".$row['id']."' type='radio' checked='' class='custom-control-input'><span class='custom-control-indicator'></span><span class='custom-control-description'>Present</span></label><label class='custom-control custom-radio'><input value='2' name='r".$row['id']."' type='radio' class='custom-control-input'><span class='custom-control-indicator'></span><span class='custom-control-description'>Absent</span></label></div></td>";
																			
																			echo "<td><input placeholder='Employee Remarks' class='form-control' type='text'></td>";
																			echo "</tr>";
																		}
																	}
																}
																$conn->close();
															?>
													</tbody>
												</table>
										</div>
                                    </div>
                                    <hr>
                                    <div class="form-actions">
										<div style="padding:15px;">
											<p id="msgItemUpdate" style="font:bold 17px/15px exo,sans-serif; color:#26c6da; margin:0px; padding:0px;"></p>
										</div>
										
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input type="submit" value="submit" class="btn btn-success"/>
                                                        
                                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> </div>
                                        </div>
                                    </div>
                                </form>
 
                            </div>
                        </div>
                 
                    </div>
                </div>
          
                
				<?php include('master-footer.php');?>
    <script src="../assets/plugins/switchery/dist/switchery.min.js"></script>
    <script src="../assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="../assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../assets/plugins/multiselect/js/jquery.multi-select.js"></script>
    <script src="js/mask.js"></script>
    <script src="js/mask.item-ajax.js"></script>

    <script>
    jQuery(document).ready(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='total_running_hours']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Hrs'
        });
        
		$("input[name='inlet_hour']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Hrs'
        });
		
		$("input[name='outlet_hour']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Hrs'
        });
		
		$("input[name='total_empty']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Qty'
        });
		
		$("input[name='total_filled']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Qty'
        });
		
		$("input[name='gate_out']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Qty'
        });
		
		$("input[name='total_labels']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Qty'
        });
		
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepo, // omitted for brevity, see the source of this page
            templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    });
    </script>
</body>

</html>
