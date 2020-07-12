<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<?php

 session_start();
if(isset($_SESSION['email']) )
 {
     header("Location:./index.php");
 }
 
//  session_destroy();

if( isset($_GET['Empty']) )
{
?>	
	<div class="alert alert-danger alert-dismissible" style="text-align: center;">
		<button type="button" class="close" data-dismiss="alert" >&times;</button>
		<?php echo $_GET['Empty']?>
	</div>

<?php
}

if( isset($_GET['Error']) )

{
?>	

	<div class="alert alert-danger alert-dismissible" style="text-align: center;">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php echo $_GET['Error']?>
	</div>
<?php 
}

?>


<div class="row"

				
data-aos="fade-down"
    data-aos-offset="50"
    data-aos-delay="0"
    data-aos-duration="1000"
    data-aos-easing="ease-in-out"
    data-aos-mirror="true"
    data-aos-once="true"
    data-aos-anchor-placement="top-center"
	
	
>
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading" style="text-align: center;">Log in</div>
				<div class="panel-body">

				<form method="POST" action="./PHP/LoginChk.php"  enctype="multipart/form-data">
						<fieldset>
							<div class="form-group">
								E-Mail<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
								Password <input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<!-- <div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div> -->
							<div style="text-align: center;">

							<button type="submit" name="loginButton" class="btn btn-primary" style="background-color:black;outline:none;width:50%;margin:auto;border:black">Login</button>
							</div>
						
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>



</body>
</html>
