<?php
	include("inc/session.php");
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> change password  </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
}
</script>
</head>

<body>

	<?php
		include("inc/connection.php");
		if(count($_POST)>0) {
		$result = "SELECT * from users WHERE username='$username'";
		$m=mysqli_query($con, $result);
		$row=mysqli_fetch_array($m);
		if($_POST["currentPassword"] == $row["password"]) {
		$e="UPDATE users set password='" . $_POST["newPassword"] . "' WHERE username='$username'";
		$res=mysqli_query($con,$e);
		$message = "Password Changed";
		} else $message = "Current Password is not correct";
		}
	?>
	<div id="wrapper">

        <!-- Navigation -->
		<?php include("inc/mainmenu.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Welcome, <small><?php echo $username; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard / Change Password
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

				<div class="row">
					<div class="well">
						<div class="row">
							<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">

								<?php if(isset($message)) {
									echo '<div class="alert alert-info">'.$message.'</div>'; 
									}
								?>
								<table class="table table-hover">
									<tr class="tableheader">
										<td colspan="2"><h3> Change Password </h3></td>
									</tr>
									<tr>
										<td width="40%"><label> Current Password </label></td>
										<td width="60%"><input type="password" name="currentPassword" class="form-control"/><span id="currentPassword"  class="required"></span></td>
									</tr>
									<tr>
										<td><label> New Password </label></td>
										<td><input type="password" name="newPassword" pattern="[a-zA-Z0-9\s]{6,8}" class="form-control"/><span id="newPassword" class="required"></span></td>
									</tr>
									<tr>
										<td><label> Confirm Password </label></td>
										<td><input type="password" name="confirmPassword" pattern="[a-zA-Z0-9\s]{6,8}" class="form-control"/><span id="confirmPassword" class="required"></span></td>
									</tr>
									<tr>
										<td colspan="2"><input type="submit" name="submit" value="Submit" class="btn btn-primary"></td>
									</tr>
								</table>
								
							</form>
						</div>
					</div>					
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>
</html>