<!DOCTYPE html>

<html lang="en">



<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>VIROKA</title>



    <!-- Bootstrap Core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">



    <!-- Custom CSS -->

    <link href="css/style.css" rel="stylesheet">

	



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



</head>



<body class="login-bg">



    <div class="container">

		<div class="row">

		<div class="col-md-6 col-md-offset-3">

			<div class="well login-container">

				<form name="" method="post" action="">

					<div class="form-group">

						<label>Username:</label>

						<input type="text" name="username" class="form-control inpt" placeholder="Username" autofocus required>

					</div>

					

					<div class="form-group">

						<label>Password:</label>

						<input type="password" name="password" class="form-control inpt"  placeholder="Password" pattern="[a-zA-Z0-9\s]{6,8}" required>

					</div>

					

					<div class="form-group">

						<input type="submit" name="login1" class="btn btn-success btn-block mybut" value="LOGIN">

					</div>



				</form>

				<?php

					include("inc/connection.php");

					include("functions/login.php");

					if(isset($_POST['login1'])){
						//alert('hi');

						login_user();

					}

				?>

				

				

			</div>

		</div>

		</div>

	</div>



    <!-- jQuery -->

    <script src="js/jquery.js"></script>



    <!-- Bootstrap Core JavaScript -->

    <script src="js/bootstrap.min.js"></script>

</body>



</html>

