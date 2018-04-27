<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
	function frameAllocation(name)
	{
		if(name=="charts")
			$("#iframe").attr("src","http://localhost/raw/index.html");	
		else if(name=="appCred")
			$("#iframe").attr("src","http://localhost/loginList/index.html");	
		else if(name=="locations")
			$("#iframe").attr("src","http://localhost/survey/location_r.php");	
	}
	
  </script>
  <style>
	.nav-stacked li{
		border-radius:0px solid red !important;
	}
  </style>
</head>
<body>

<div class="container">
    <div class="col-md-2" style="background-color:none; min-height:1000px;padding:0px;">
      <ul class="nav nav-pills nav-stacked">
        <li onclick="frameAllocation('charts')"><a href="#" style="background:white; color:black !important;"><i class="fa fa-bar-chart-o"></i> Charts</a></li>
		<li onclick="frameAllocation('appCred')"><a href="#" style="background:white; color:black !important;"><i class="fa fa-address-card-o"></i> App Credentials</a></li>
		<li onclick="frameAllocation('locations')"><a href="#" style="background:white; color:black !important;"><i class="fa fa-location-arrow"></i> Locations</a></li>
		
      </ul>
    </div>
	<div class="col-md-9" style="padding:0px;">
		<iframe id="iframe" src="http://localhost/raw/index.html" style="background:none; border:0px solid red;" height="1000px" width="100%"></iframe>

	</div>
  </div>
</div>

</body>
</html>
