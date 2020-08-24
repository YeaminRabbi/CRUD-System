<!DOCTYPE html>
<html>
<head>
	<title>Rabbi</title>
	<!--Fabicon Image-->
	
	<link rel="shortcut icon"  href="img/logo.png">
	<!--Boostrap 4 CDN -->
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!---Custom CSS-->
	<link rel="stylesheet" type="text/css" href="css/style.css">


	<!-- Sweet Alert 2 javaScript CDN Link -->
  	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>


	<div class="container" style="width:100%;margin-top:100px;text-align: center;">

		<h2 class="mb-3">Project Pages</h2>
		<a class="btn btn-outline-warning" href="login.php" data-toggle="modal" data-target="#LOGIN-modal">Login</a>
		<a class="btn btn-outline-primary" href="register.php">Register</a>

	</div>

			<!-- Login Modal -->
			<div class="modal fade" id="LOGIN-modal">
			  <div class="modal-dialog">
			    <div class="modal-content">

			      <!-- Modal Header -->
			      <div class="modal-header">
			        <h4 class="modal-title">Login Form</h4>
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>

			      <!-- Modal body -->
			     <form action="action.php" method="POST">
				    <div class="modal-body">
				          <div class="form-group">
						    <label for="email">Email address:</label>
						    <input type="email" class="form-control" placeholder="Enter email" name="email"required>
						  </div>

						  <div class="form-group">
						    <label for="pwd">Password:</label>
						    <input type="password" class="form-control" placeholder="Enter password" name="password" required>
						  </div>	
				    </div>

				      <!-- Modal footer -->
				    <div class="modal-footer">
				      <button type="submit" class="btn btn-primary" name="btn-LOGIN">Submit</button>
				      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				    </div>
			  	 </form>
			    </div>
			  </div>
			</div>







	<!-- JD CDN links --->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	

</body>
</html>

<!-----Java Script for Error Check------->
<?php require_once "errorCheck.php"; ?>