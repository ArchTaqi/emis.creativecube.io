<?php
	include('config.php');
	$msg="";
	if(isset($_POST['mineral_ca']) && isset($_POST['mineral_na']) && isset($_POST['mineral_mg']))
	{
		
		//echo "<script>alert('a')</script>";
		$mineral_ca=$_POST['mineral_ca'];
		$mineral_na=$_POST['mineral_na'];
		$mineral_mg=$_POST['mineral_mg'];
		$mineral_ci=$_POST['mineral_ci'];
		$mineral_so4=$_POST['mineral_so4'];
		$mineral_k=$_POST['mineral_k'];
		$mineral_hco3=$_POST['mineral_hco3'];
		
		$sql="INSERT INTO minerals (ca,na,mg,ci,so4,k,hco3) 
			VALUES ('$mineral_ca','$mineral_na','$mineral_mg','$mineral_ci','$mineral_so4','$mineral_k','$mineral_hco3')";
		
			if (mysqli_query($conn, $sql)) 
			{
				$msg = "Minerals Info Added Successfully";
			} else {
				$msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script>
		var liters="";
		var pageURL="";
		$(document).ready(function()
		{
			$("#uploadForm").on('submit',(function(e) {
				e.preventDefault();
				if($("#stockInOut").val()=="submit")
				{
					document.getElementById("msgItemUpdate").innerHTML="Warning: Select above Option to STOCK IN or STOCK OUT.";
					return false;
				}
				else if($("#stockInOut").val()=="Stock In")
				{
					pageURL="php/stock-in-mineral.php";
				}
				else
				{
					pageURL="php/stock-out-mineral.php";
				}
				document.getElementById("msgItemUpdate").innerHTML="Processing...";
				$.ajax({
					type: "POST",
					url: pageURL,
					data:{
						'mineral_ca':$("[name='mineral_ca']").val(),
						'mineral_na':$("[name='mineral_na']").val(),
						'mineral_mg':$("[name='mineral_mg']").val(),
						'mineral_ci':$("[name='mineral_ci']").val(),
						'mineral_so4':$("[name='mineral_so4']").val(),
						'mineral_k':$("[name='mineral_k']").val(),
						'mineral_hco3':$("[name='mineral_hco3']").val(),
						'mineral_anti_scaling':$("[name='mineral_anti_scaling']").val(),
					},
					success: function(data) {
						document.getElementById("msgItemUpdate").innerHTML=data;
						$("[name='mineral_ca']").val("0");
						$("[name='mineral_na']").val("0");
						$("[name='mineral_mg']").val("0");
						$("[name='mineral_ci']").val("0");
						$("[name='mineral_so4']").val("0");
						$("[name='mineral_k']").val("0");
						$("[name='mineral_hco3']").val("0");
						$("[name='mineral_anti_scaling']").val("0");
					},
					error: function(data) {
						alert(data);
					}
				});
				
			}));
			
			$("[name='radioStock']").change(function() {
				if(this.checked) {
					//alert(this.getAttribute("data-id"));
					if(this.getAttribute("data-id")=="in")
					{
						$("#stockInOut").val("Stock In");
					}
					else
					{
						$("#stockInOut").val("Stock Out");
					}
					//$("#stockInOut").val("Stock Out");
					document.getElementById("msgItemUpdate").innerHTML="";
				}
			});
		
		});
		
		function changeDetect()
		{
			//$("[name='rtg']").val( $("[name='rtg']").val()-$("[name='gate_out']").val() );
		}
		
		

	</script>
</head>

<body class="fix-header card-no-border logo-center">
	<?php include('master-header.php');?>	
	
	
	
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Minerals</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Minerals</li>
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
                                        <h3 class="box-title">Mineral Info</h3>
                                        <hr class="m-t-0 m-b-40">
                                        
                                        <!--/row-->
                                        
										<div class="row" style="margin:30px;">
											<h4>Select do you want to <b>Stock in</b> or <b>Stock out:</b></h4>
                                            <div class="col-md-6">
                                                <div class="radio-list">
																	<label class="custom-control custom-radio">
																		<input id="radio3" data-id="in" name="radioStock" type="radio" class="custom-control-input">
																		<span class="custom-control-indicator"></span>
																		<span class="custom-control-description">Stock In</span>
																	</label>
																	<label class="custom-control custom-radio">
																		<input id="radio4" data-id="out" name="radioStock" type="radio" class="custom-control-input">
																		<span class="custom-control-indicator"></span>
																		<span class="custom-control-description">Stock Out</span>
																	</label>
																</div>
											</div>

										</div>
										<br>
										
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Ca</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" placeholder="Ca" name="mineral_ca" class=" form-control" required value="0" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Na</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" placeholder="Na" name="mineral_na" class=" form-control" required value="0" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Mg</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" placeholder="Mg" name="mineral_mg" class=" form-control" required value="0" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                                    </div>
                                                </div>
                                            </div>
											<div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Ci</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" placeholder="Ci" name="mineral_ci" class=" form-control" required value="0" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                                    </div>
                                                </div>
                                            </div>
											
                                        </div>
										
										
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">SO4</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" placeholder="SO4" name="mineral_so4" class=" form-control" required value="0" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                                    </div>
                                                </div>
                                            </div>
											<div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">K</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" placeholder="K" name="mineral_k" class=" form-control" required value="0" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                                    </div>
                                                </div>
                                            </div>
											
                                        </div>
										
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">HCO3</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" placeholder="HCO3" name="mineral_hco3" class=" form-control" required value="0" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Anti Scaling</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" placeholder="HCO3" name="mineral_anti_scaling" class=" form-control" required value="0" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                                    </div>
                                                </div>
                                            </div>
											
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
                                                        <input id="stockInOut" type="submit" value="submit" class="btn btn-success"/>
                                                        
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
        $("input[name='mineral_ca']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Pct'
        });
        
		$("input[name='mineral_na']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Pct'
        });
		
		$("input[name='mineral_mg']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Pct'
        });
		
		$("input[name='mineral_ci']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Pct'
        });
		
		$("input[name='mineral_so4']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Pct'
        });
		
		$("input[name='mineral_k']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Pct'
        });
		
		$("input[name='mineral_hco3']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Pct'
        });
		
		$("input[name='mineral_anti_scaling']").TouchSpin({
            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'Pct'
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
