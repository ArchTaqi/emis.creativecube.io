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
						
						var ppe,gentle,house,client,employee,tech_work,qhse;
						if($("input[name='ppe"+MyIndexValue+"'][value='1']").prop("checked")){ppe="Y";}else{ppe="N";}
						if($("input[name='gentle"+MyIndexValue+"'][value='1']").prop("checked")){gentle="Y";}else{gentle="N";}
						if($("input[name='house"+MyIndexValue+"'][value='1']").prop("checked")){house="Y";}else{house="N";}
						if($("input[name='client"+MyIndexValue+"'][value='1']").prop("checked")){client="G";}else{client="B";}
						if($("input[name='employee"+MyIndexValue+"'][value='1']").prop("checked")){employee="G";}else{employee="B";}
						if($("input[name='tech_work"+MyIndexValue+"'][value='1']").prop("checked")){tech_work="G";}else{tech_work="B";}
						if($("input[name='qhse"+MyIndexValue+"'][value='1']").prop("checked")){qhse="G";}else{qhse="B";}
						
						sql+="INSERT INTO employees_performance (employee_id, ppe, gentle_atitude,house_keeping,client_relation,employee_relation,technical_work,qhse,date) VALUES ("+MyIndexValue+",'"+ppe+"','"+gentle+"','"+house+"','"+client+"','"+employee+"','"+tech_work+"','"+qhse+"','"+today+"');";
					}
					
					
					$.ajax({
						type: "POST",
						url: "php/performance.php",
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
					document.getElementById("msgItemUpdate").innerHTML="Today's Performance already Marked";
				}
				
				
			}));
		});
	</script>
	
</head>

<body class="fix-header card-no-border logo-center">
	<?php include('master-header.php');?>	
	
	
	
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Employee Performance</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Employee Performance</li>
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
                                        <h3 class="box-title">Employee Performance</h3>
                                        <hr class="m-t-0 m-b-40">
										<div class="table-responsive m-t-40">
										<h4>Date: <?php echo date('Y-m-d');?></h4>
											<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>id</th>
															<th>Name</th>
															<th>Phone</th>
															<th>Wearing Of PPE</th>
															<th>Gentle Atitude</th>
															<th>House Keeping</th>
															<th>Client Relation</th>
															<th>Employee Relation</th>
															<th>Technical work</th>
															<th>QHSE</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th>id</th>
															<th>Name</th>
															<th>Phone</th>
															<th>Wearing Of PPE</th>
															<th>Gentle Atitude</th>
															<th>House Keeping</th>
															<th>Client Relation</th>
															<th>Employee Relation</th>
															<th>Technical work</th>
															<th>QHSE</th>
														</tr>
													</tfoot>
													<tbody id="companyData">
														<?php		
															include "config.php";					
																		
																$todayDate=date('Y-m-d');
																$sql1 = "SELECT * FROM employees_performance WHERE date='$todayDate'";
																$result1 = $conn->query($sql1);
																if ($result1->num_rows > 0) 
																{
																	echo "<tr>Today's Performance already Marked</tr>";
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
																			echo "<td><div class='radio-list'><label class='custom-control custom-radio'><input value='1' name='ppe".$row['id']."' type='radio' checked='' class='custom-control-input'><span class='custom-control-indicator'></span><span class='custom-control-description'>Y</span></label><label class='custom-control custom-radio'><input value='2' name='ppe".$row['id']."' type='radio' class='custom-control-input'><span class='custom-control-indicator'></span><span class='custom-control-description'>N</span></label></div></td>";
																			
																			echo "<td><div class='radio-list'><label class='custom-control custom-radio'><input value='1' name='gentle".$row['id']."' type='radio' checked='' class='custom-control-input'><span class='custom-control-indicator'></span><span class='custom-control-description'>Y</span></label><label class='custom-control custom-radio'><input value='2' name='gentle".$row['id']."' type='radio' class='custom-control-input'><span class='custom-control-indicator'></span><span class='custom-control-description'>N</span></label></div></td>";
																			
																			echo "<td><div class='radio-list'><label class='custom-control custom-radio'><input value='1' name='house".$row['id']."' type='radio' checked='' class='custom-control-input'><span class='custom-control-indicator'></span><span class='custom-control-description'>Y</span></label><label class='custom-control custom-radio'><input value='2' name='house".$row['id']."' type='radio' class='custom-control-input'><span class='custom-control-indicator'></span><span class='custom-control-description'>N</span></label></div></td>";
																			
																			echo "<td><div class='radio-list'><label class='custom-control custom-radio'><input value='1' name='client".$row['id']."' type='radio' checked='' class='custom-control-input'><span class='custom-control-indicator'></span><span class='custom-control-description'>G</span></label><label class='custom-control custom-radio'><input value='2' name='client".$row['id']."' type='radio' class='custom-control-input'><span class='custom-control-indicator'></span><span class='custom-control-description'>B</span></label></div></td>";
																			
																			echo "<td><div class='radio-list'><label class='custom-control custom-radio'><input value='1' name='employee".$row['id']."' type='radio' checked='' class='custom-control-input'><span class='custom-control-indicator'></span><span class='custom-control-description'>G</span></label><label class='custom-control custom-radio'><input value='2' name='employee".$row['id']."' type='radio' class='custom-control-input'><span class='custom-control-indicator'></span><span class='custom-control-description'>B</span></label></div></td>";
																			
																			echo "<td><div class='radio-list'><label class='custom-control custom-radio'><input value='1' name='tech_work".$row['id']."' type='radio' checked='' class='custom-control-input'><span class='custom-control-indicator'></span><span class='custom-control-description'>G</span></label><label class='custom-control custom-radio'><input value='2' name='tech_work".$row['id']."' type='radio' class='custom-control-input'><span class='custom-control-indicator'></span><span class='custom-control-description'>B</span></label></div></td>";
																			
																			echo "<td><div class='radio-list'><label class='custom-control custom-radio'><input value='1' name='qhse".$row['id']."' type='radio' checked='' class='custom-control-input'><span class='custom-control-indicator'></span><span class='custom-control-description'>G</span></label><label class='custom-control custom-radio'><input value='2' name='qhse".$row['id']."' type='radio' class='custom-control-input'><span class='custom-control-indicator'></span><span class='custom-control-description'>B</span></label></div></td>";
																			
																			echo "</tr>";
																		}
																	}
																}
																$conn->close();
														?>
														<!--	
														<tr>
															<td>1</td>
															<td>Amir</td>
															<td>0343-6599622</td>
															<td>
																<div class="radio-list">
																	<label class="custom-control custom-radio">
																		<input id="radio3" name="ppe" type="radio" checked="" class="custom-control-input">
																		<span class="custom-control-indicator"></span>
																		<span class="custom-control-description">Y</span>
																	</label>
																	<label class="custom-control custom-radio">
																		<input id="radio4" name="ppe" type="radio" class="custom-control-input">
																		<span class="custom-control-indicator"></span>
																		<span class="custom-control-description">N</span>
																	</label>
																</div>
															</td>
															
															<td>
																<div class="radio-list">
																	<label class="custom-control custom-radio">
																		<input id="radio3" name="gentle_atitude" type="radio" checked="" class="custom-control-input">
																		<span class="custom-control-indicator"></span>
																		<span class="custom-control-description">Y</span>
																	</label>
																	<label class="custom-control custom-radio">
																		<input id="radio4" name="gentle_atitude" type="radio" class="custom-control-input">
																		<span class="custom-control-indicator"></span>
																		<span class="custom-control-description">N</span>
																	</label>
																</div>
															</td>
															
															<td>
																<div class="radio-list">
																	<label class="custom-control custom-radio">
																		<input id="radio3" name="house_keeping" type="radio" checked="" class="custom-control-input">
																		<span class="custom-control-indicator"></span>
																		<span class="custom-control-description">Y</span>
																	</label>
																	<label class="custom-control custom-radio">
																		<input id="radio4" name="house_keeping" type="radio" class="custom-control-input">
																		<span class="custom-control-indicator"></span>
																		<span class="custom-control-description">N</span>
																	</label>
																</div>
															</td>
															
															<td>
																<div class="radio-list">
																	<label class="custom-control custom-radio">
																		<input id="radio3" name="client_relation" type="radio" checked="" class="custom-control-input">
																		<span class="custom-control-indicator"></span>
																		<span class="custom-control-description">G</span>
																	</label>
																	<label class="custom-control custom-radio">
																		<input id="radio4" name="client_relation" type="radio" class="custom-control-input">
																		<span class="custom-control-indicator"></span>
																		<span class="custom-control-description">B</span>
																	</label>
																</div>
															</td>
															
															<td>
																<div class="radio-list">
																	<label class="custom-control custom-radio">
																		<input id="radio3" name="employee_relation" type="radio" checked="" class="custom-control-input">
																		<span class="custom-control-indicator"></span>
																		<span class="custom-control-description">G</span>
																	</label>
																	<label class="custom-control custom-radio">
																		<input id="radio4" name="employee_relation" type="radio" class="custom-control-input">
																		<span class="custom-control-indicator"></span>
																		<span class="custom-control-description">B</span>
																	</label>
																</div>
															</td>
															
															<td>
																<div class="radio-list">
																	<label class="custom-control custom-radio">
																		<input id="radio3" name="tech_work" type="radio" checked="" class="custom-control-input">
																		<span class="custom-control-indicator"></span>
																		<span class="custom-control-description">G</span>
																	</label>
																	<label class="custom-control custom-radio">
																		<input id="radio4" name="tech_work" type="radio" class="custom-control-input">
																		<span class="custom-control-indicator"></span>
																		<span class="custom-control-description">B</span>
																	</label>
																</div>
															</td>
															
															<td>
																<div class="radio-list">
																	<label class="custom-control custom-radio">
																		<input id="radio3" name="qhse" type="radio" checked="" class="custom-control-input">
																		<span class="custom-control-indicator"></span>
																		<span class="custom-control-description">G</span>
																	</label>
																	<label class="custom-control custom-radio">
																		<input id="radio4" name="qhse" type="radio" class="custom-control-input">
																		<span class="custom-control-indicator"></span>
																		<span class="custom-control-description">B</span>
																	</label>
																</div>
															</td>
															
															
														</tr>
														-->
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
