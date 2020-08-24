<?php	
	session_start();
?>

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


	<style>
		body{
			background-color: #FFF5EE;
		}

		.reg-form{
			background-color: white;
		}		
	</style>
</head>
<body>


	<section class="Registration-FORM">
		<div class="reg-form container mt-4 p-5" style="max-width: 30%;border: 3px solid black;border-radius: 10px;">
		  
		  <h2 class="text-center">Registration Form</h2>
		  
		  <form action="action.php" method="POST">
		  	
		  	<div class="form-group">
		      <label for="username">Username:</label>
		      <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" required>
		      	<span style="color: red;">
		    	<?php
		    		if(isset($_SESSION['username-error'])) {
		    			echo $_SESSION['username-error']; 
		    			unset($_SESSION['username-error']);
		    		}

		    	?>	    			
		    	</span>
		    </div>

		    <div class="form-group">
		      <label for="email">Email:</label>
		      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
		      	<span style="color: red;">
		    	<?php
		    		if(isset($_SESSION['email-error'])) {
		    			echo $_SESSION['email-error']; 
		    			unset($_SESSION['email-error']);
		    		}

		    	?>	    			
		    	</span>
		    </div>

		    <div class="form-group">
		      <label for="contact">Contact:</label>
		      <input type="text" class="form-control" id="contact" placeholder="Enter contact" name="contact" required>
		      	<span style="color: red;">
		    	<?php
		    		if(isset($_SESSION['contact-error'])) {
		    			echo $_SESSION['contact-error']; 
		    			unset($_SESSION['contact-error']);
		    		}

		    	?>	    			
		    	</span>
		    </div>

		    <div class="form-group">
		      <label for="password">Password:</label>
		      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
		      	<span style="color: red;">
		    	<?php
		    		if(isset($_SESSION['password-error'])) {
		    			echo $_SESSION['password-error']; 
		    			unset($_SESSION['password-error']);
		    		}

		    	?>	    			
		      	</span>
		    </div>

		    <div class="form-group">
		    	<span style="color: red;">
			    	<?php
			    		if(isset($_SESSION['data-error'])) {
			    			echo $_SESSION['data-error']; 
			    			unset($_SESSION['data-error']);
			    		}

			    	?>	    			
		    	</span>
		    </div>
		    
		    <button type="submit" name="reg-btn" class="btn btn-primary">Submit</button>
		  </form>
		</div>

	</section>








	<!-- JD CDN links --->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>