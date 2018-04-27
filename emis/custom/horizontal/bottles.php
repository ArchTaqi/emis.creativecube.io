<!DOCTYPE html>
<html lang="en">
<head>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script>
		var liters="";
		var pageURL="";
		$(document).ready(function()
		{
			if(window.localStorage.getItem("liters")!=null)
			{
				liters=window.localStorage.getItem("liters");
				$(".titleOfbottle").html(liters);
			}
			else
			{
				liters="19 Liter Bottle";
				$(".titleOfbottle").html(liters);
			}
			
			$("#uploadForm").on('submit',(function(e) {
				e.preventDefault();
				if($("#stockInOut").val()=="Submit")
				{
					document.getElementById("msgItemUpdate").innerHTML="Warning: Select above Option to STOCK IN or STOCK OUT.";
					return false;
				}
				else if($("#stockInOut").val()=="Stock In")
				{
					pageURL="php/stock-in.php";
				}
				else
				{
					pageURL="php/stock-out.php";
				}
				document.getElementById("msgItemUpdate").innerHTML="Processing...";
				$.ajax({
					type: "POST",
					url: pageURL,
					data:{
						'liters':liters,
						'total_packs':$("[name='total_packs']").val(),
						'total_caps_pack':$("[name='total_caps_pack']").val(),
						'total_caps':$("[name='total_caps']").val(),
						'total_empty':$("[name='total_empty']").val(),
						'total_filled':$("[name='total_filled']").val(),
						'rtg':$("[name='rtg']").val(),
						'gate_out':$("[name='gate_out']").val(),
						'total_labels':$("[name='total_labels']").val(),
					},
					success: function(data) {
						document.getElementById("msgItemUpdate").innerHTML=data;
						$("[name='total_packs']").val("0");
						$("[name='total_caps_pack']").val("0");
						$("[name='total_caps']").val("0");
						$("[name='total_empty']").val("0");
						$("[name='total_filled']").val("0");
						$("[name='rtg']").val("0");
						$("[name='gate_out']").val("0");
						$("[name='total_labels']").val("0");
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
                        <h3 class="text-themecolor m-b-0 m-t-0"><span class="titleOfbottle">Bottles Inventory</span></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">19 Liter Bottles</li>
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
                                        <h3 class="box-title"><span class="titleOfbottle">19 Liter Bottles Info</span></h3>
                                        <hr class="m-t-0 m-b-40">
                                        
                                        <!--/row-->
                                        
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
                                        <div class="row">
										<!--
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Expenses Title<span class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="name" name="expense_title" class="form-control" required data-validation-required-message="This field is required">
                                                        <small class="form-control-feedback">For Example: Driver Nashta</small> </div>
                                                </div>
                                            </div>
											-->
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Total Packs</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" value="0" name="total_packs" class=" form-control" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Total Caps Pack</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" value="0" name="total_caps_pack" class=" form-control" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Total Caps</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" value="0" name="total_caps" class=" form-control" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Total Empty</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" value="0" name="total_empty" class=" form-control" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                                    </div>
                                                </div>
                                            </div>
											
                                        </div>
										
										
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Total Filled</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" value="0" name="total_filled" class=" form-control" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">RTG</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" value="0" name="rtg" class=" form-control" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" required>
                                                    </div>
                                                </div>
                                            </div>
											
                                        </div>
										
										
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Gate out</label>
                                                    <div class="col-md-9">
                                                        <input onchange="changeDetect()" onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange(); type="text"  name="gate_out" class=" form-control" value="0" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Total Labels</label>
                                                    <div class="col-md-9">
                                                        <input id="" type="text" value="0" name="total_labels" class=" form-control" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
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
                                                        <input id="stockInOut" type="submit" value="Submit" class="btn btn-success"/>
                                                        
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
		
		$("input[name='rtg']").TouchSpin({
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
