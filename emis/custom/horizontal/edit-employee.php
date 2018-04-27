<?php
	//echo "<script>alert('hello');</script>";		
include "config.php";

	$employee_id="";	
	$employee_name="";
	$phone_number="";
	$email="";
	$id_number="";
	$employed_date="";
	$refered_by="";
	$ref_number="";
	$remarks="";
	if(isset($_POST['employee_ids']))
	{
		$employee_id = $_POST['employee_ids'];
		$sql="SELECT * from employees WHERE id=$employee_id";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			$row = $result->fetch_assoc();
			$employee_name=$row['employee_name'];
			$phone_number=$row['phone_number'];
			$email=$row['email'];
			$id_number=$row['id_number'];
			$employed_date=$row['employeed_date'];
			$refered_by=$row['refered_by'];
			$ref_number=$row['ref_number'];
			$remarks=$row['remarks'];
		}
	}
		$conn->close();
?>

<?php
	include('config.php');
	$msg="";
	if(isset($_POST['employee_name']) && isset($_POST['phone_number']) && isset($_POST['email']))
	{
		//echo "<script>alert('a')</script>";
		$employee_name=$_POST['employee_name'];
		$phone_number=$_POST['phone_number'];
		$email=$_POST['email'];
		$id_number=$_POST['id_card'];
		$employed_date=$_POST['employed_date'];
		$refered_by=$_POST['refered_by'];
		$ref_number=$_POST['ref_number'];
		$remarks=$_POST['remarks'];
		$employee_id=$_POST['employee_id'];
		
		if($employee_id=="" || $employee_id=="null")
		{
			$msg = "*Select Employee";
		}
		else
		{
			$sql="UPDATE employees set employee_name='$employee_name',phone_number='$phone_number',email='$email',id_number='$id_number',employeed_date='$employed_date',refered_by='$refered_by',ref_number='$ref_number',remarks='$remarks' WHERE id='$employee_id' ";
		
			if (mysqli_query($conn, $sql)) 
			{
				$msg = "Employee Info Updated Successfully";
				setcookie('id',"");
			} else {
				$msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	}
	$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<script src="js/jquery-1.11.1.min.js"></script>
	
</head>

<body class="fix-header card-no-border logo-center">
	<?php include('master-header.php');?>	
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Employee Profile</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Employee</li>
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
  
  
								
                                    <div class="form-body">
                                        <h3 class="box-title">Update Employee Info</h3>
                                        <hr class="m-t-0 m-b-40">
                                        
                                        <!--/row-->
                                        <div class="row">
                                            <form action="edit-employee.php" method="POST" class="form-horizontal" style="width:100%;">
												<div class="form-group row">
												<div class="col-md-3">
											</div>
												<div class="col-md-6">
													<?php include('old-employees.php');?>
												</div>
												<div class="col-md-offset-3 col-md-2">
                                                        <input type="submit" value="Search" class="btn btn-success"/>
                                                    </div>
												</div>
											</form>
										</div>
                                        <!--/row-->
										<form action="edit-employee.php" method="POST" class="form-horizontal">
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Name</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" value="<?php echo $employee_name;?>" placeholder="Employee Name" name="employee_name" class=" form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Phone Number</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" value="<?php echo $phone_number;?>" data-mask="9999-9999999" placeholder="Phone Number" name="phone_number" class=" form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Email</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" value="<?php echo $email;?>" placeholder="Email Address" name="email" class=" form-control" required>
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Id Card</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" value="<?php echo $id_number;?>"  data-mask="99999-9999999-9" placeholder="ID Card Number" name="id_card" class=" form-control" required>
                                                    </div>
                                                </div>
                                            </div>
											
                                        </div>
										
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Employed Date</label>
                                                    <div class="col-md-9">
                                                        <input id="" value="<?php echo $employed_date;?>" type="date" name="employed_date" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Refered by</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" value="<?php echo $refered_by;?>" placeholder="Refered By" name="refered_by" class=" form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
											
											<div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Ref Number</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" value="<?php echo $ref_number;?>" placeholder="Ref Number" name="ref_number" class=" form-control" required>
                                                    </div>
                                                </div>
                                            </div>
											
											
											<div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Remarks</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" value="<?php echo $remarks;?>" placeholder="Remarks" name="remarks" class=" form-control" required>
                                                    </div>
                                                </div>
                                            </div>
											
                                        </div>
										
										<input hidden name="employee_id" value="<?php if(isset($employee_id)){if($employee_id=="")echo "";else echo $employee_id;}?>" type="text">
                                    </div>
                                    <hr>
									
                                    <div class="form-actions">
										<div style="padding:15px;">
											<p id="msgItemUpdate" style="font:bold 17px/15px exo,sans-serif; color:#26c6da; margin:0px; padding:0px;"><?php echo $msg; $msg="";?></p>
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
        $("input[name='demand']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Rs.'
        });
        
		$("input[name='total_caps_pack']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Qty'
        });
		
		$("input[name='total_caps']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Qty'
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
