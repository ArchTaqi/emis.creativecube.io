<?php
	include('config.php');
	$msg="";
	
	$old_user=$_COOKIE['username'];
	$old_password="";
	
	$sql="SELECT * from register WHERE user='$old_user'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while( $row = mysqli_fetch_array($result)){
			$old_user=$row['user'];
			$old_password=$row['password'];
			
		}
	}
	
	if(isset($_POST['user']) && isset($_POST['old_password']) && isset($_POST['confirm_password']) && isset($_POST['new_password']))
	{
		$user=$_POST['user'];
		$old_pass=$_POST['old_password'];
		$new_password=$_POST['new_password'];
		$confirm_password=$_POST['confirm_password'];
			
		if($confirm_password == $new_password)
		{
			//echo "<script>alert('a')</script>";
			if($old_pass!=$old_password)
			{
				$msg = "Old-Password Mismatch";
				
			}
			else
			{
				$sql="UPDATE register SET user='$user', password='$new_password' WHERE user='$old_user' AND password='$old_pass' ";
		
				if (mysqli_query($conn, $sql)) 
				{
					$msg = "Profile updated Successfully";
					setcookie('username',$user);
					header("Location: settings.php");
					
				} else {
					$msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
				}	
				
			}
		}
		else
		{
			$msg = "New-Password and Confirm-Password Mismatch";
		}
		
			
			
		
	}
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Settings</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Account Settings</li>
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
					<div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <center><h3 class="card-title">My Profile</h3></center>
                                <center><h6 class="card-subtitle">Change Your Profile Info</h6></center>
                                <form method="POST" action="settings.php" class="form p-t-20">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">User Name</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-email"></i></div>
                                            <input type="text" name="user" value="<?php echo $old_user;?>" class="form-control" id="exampleInputEmail1" placeholder="User Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd1">Old Password</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                                            <input type="password" name="old_password" class="form-control" placeholder="Password" required>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label for="pwd1">New Password</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                                            <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label for="pwd1">Confirm Password</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                        </div>
                                    </div>
									
									<p style="color:red;"><?php echo $msg;?></p>		
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Change</button>
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
