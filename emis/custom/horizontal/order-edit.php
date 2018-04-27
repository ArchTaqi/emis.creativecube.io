<?php
	$msg="";
	include('config.php');
	if(isset($_POST['order_date']) && isset($_POST['delivery_date']) && isset($_POST['demand']))
	{
		$order_date=$_POST['order_date'];
		$delivery_date=$_POST['delivery_date'];
		$order_description=$_POST['order_description'];
		$demand=$_POST['demand'];
		$order_id=$_POST['order_id'];
		
		if($order_id==""  || $order_id=="null")
		{
			$msg = "*Select Client";
		}
		else
		{
			$sql="UPDATE orders set order_date='$order_date',delivery_date='$delivery_date',order_description='$order_description',demand = '$demand' WHERE id='$order_id'";
		
			if (mysqli_query($conn, $sql)) 
			{
				$msg = "Order details Updated Successfully";
				setcookie('id',"");
			} else {
				$msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<script src="js/jquery-1.11.1.min.js"></script>
	
	<script>
	var ordersDetails=' ';
	var index=1;
<?php
	//echo "<script>alert('hello');</script>";		
include "config.php";
	$order_id="";
	$order_date="";
	$delivery_date="";
	$order_description="";
	$demand="0";
	if(isset($_POST['client_id']))
	{
		
		$client_id = $_POST['client_id'];
		$sql="SELECT * from orders WHERE client_id=$client_id";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			$rows = [];
			while($row = mysqli_fetch_array($result))
			{
				$rows[] = $row;
			}
			echo "ordersDetails = ". json_encode($rows) . ";\n";
			
			$order_id=$rows[0]['id'];
			$order_date=$rows[0]['order_date'];
			$delivery_date=$rows[0]['delivery_date'];
			$order_description=$rows[0]['order_description'];
			$demand=$rows[0]['demand'];
		}
		else
		{
			$msg="No Order Found";
			echo "ordersDetails = ".' '.";\n";
		}
	}
		$conn->close();
?>

		$("document").ready(function(){
			$("[name='client_id']").on('change', function() {
			  //alert( ordersDetails.length );
			});
		});
		
		function orderSelect(which)
		{
			if(which=="next")
			{
				if(index==0)
					index=1;
				if(ordersDetails!=' ' && index<ordersDetails.length)
				{
					//alert(ordersDetails[index]['id']);
					$("[name=order_id]").val(ordersDetails[index]['id']);
					$("[name=order_date]").val(ordersDetails[index]['order_date']);
					$("[name=delivery_date]").val(ordersDetails[index]['delivery_date']);
					$("[name=order_description]").val(ordersDetails[index]['order_description']);
					$("[name=demand]").val(ordersDetails[index]['demand']);
					index++;
				}
			}
			else
			{
				if(index==ordersDetails.length)
					index=ordersDetails.length-1;
				if(ordersDetails!=' ' && index>0)
				{
					index--;
					//alert(ordersDetails[index]['id']);
					$("[name=order_id]").val(ordersDetails[index]['id']);
					$("[name=delivery_date]").val(ordersDetails[index]['delivery_date']);
					$("[name=order_description]").val(ordersDetails[index]['order_description']);
					$("[name=demand]").val(ordersDetails[index]['demand']);
				}
			}
		}
	</script>
</head>

<body class="fix-header card-no-border logo-center">
	<?php include('master-header.php');?>	
	
	
	
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Order Details</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Order</li>
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
                                        <h3 class="box-title">Update Order Details</h3>
                                        <hr class="m-t-0 m-b-40">
                                        
                                        <!--/row-->
										<form action="order-edit.php" method="POST" class="form-horizontal" style="width:100%;">
											<div class="row">
													<div class="col-md-2">
													</div>
													<div class="col-md-7">
														<?php include('old-clients.php');?>
													</div>
													<div class="col-md-2">
															<input type="submit" value="Search" class="btn btn-success"/>
														</div>
											</div>
										</form>
										<form action="order-edit.php" method="POST" class="form-horizontal">
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Order Date</label>
                                                    <div class="col-md-9">
                                                        <input id="" value="<?php echo $order_date;?>" type="date" name="order_date" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Delivery Date</label>
                                                    <div class="col-md-9">
                                                        <input id="" value="<?php echo $delivery_date;?>" type="date" name="delivery_date" class=" form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Order Description</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" value="<?php echo $order_description;?>" placeholder="Order Description" name="order_description" class=" form-control" required>
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Demand</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" value="<?php echo $demand;?>" name="demand" class=" form-control" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                                    </div>
                                                </div>
                                            </div>
											
                                        </div>
										
										<input hidden name="order_id" value="<?php if(isset($order_id)){if($order_id=="")echo "";else echo $order_id;}?>" type="text">
										<div class="row">
											<div class="col-md-5">
											</div>
                                            <div class="col-md-3">
											<button onclick="orderSelect('prev')" type="button" class="btn btn-inverse"><</button>
											&nbsp;
											&nbsp;
											&nbsp;
											&nbsp;
											&nbsp;
											<button onclick="orderSelect('next')" type="button" class="btn btn-inverse">></button>
											</div>
                                        </div>
										
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
        $("input[name='total_packs']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Qty'
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
