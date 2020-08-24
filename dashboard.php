<?php 
	
	session_start();
	require_once "dbConnection.php";
	require_once "Cfunction.php";
	$activeUser=countUSER($db,1);
	$inactiveUser=countUSER($db,0);



?>

<!DOCTYPE html>
<html>
<head>
	<title>Rabbi</title>
	<!--Fabicon Image-->
	
	<link rel="shortcut icon"  href="img/logo.png">
	<!--Boostrap 4 CDN -->
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- Font Awesome CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<!---Custom CSS-->
	<link rel="stylesheet" type="text/css" href="css/style.css">


	<!-- Sweet Alert 2 javaScript CDN Link -->
  	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>


	<div class="container" style="margin-top: 30px;">
	  
	  <div class="m-2">
	  	<h2 style="display: inline;margin-left:40%;">Active Users(<?= $activeUser['total']; ?>)</h2>  
	  
	  	<a href="#" class="btn btn-primary" style="float:right;margin-right: 120px;"><i class="fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#ADDuser">&nbsp Add User</i></a>
	  </div>

	  <table class="table table-hover text-center">
	    <thead class="thead-dark">
	      <tr>

	      	<th>#SL</th>
	        <th>Name</th>
	        <th>Email</th>
	        <th>Contact</th>
	        <th>Option</th>
	        <th style="visibility:hidden;">ID</th>
	      </tr>
	    </thead>
	    <tbody>

		    <?php
		    	$info = allDATA($pdo,1);
		    	foreach ($info as $key => $val) {
		    ?>

		    <tr>
		    	
		    	<td><?= $key+1; ?></td>
		    	<td><?= $val['username']; ?></td>
		    	<td><?= $val['email']; ?></td>
		    	<td><?= $val['contact']; ?></td>
		    	
				<td>
					<a href="#" class="btn btn-success btn-userEdit" data-toggle="modal" data-target="#EDIT-modal"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<a class="btn btn-danger" style="color: white;" href="action.php?userid=<?= $val['id']; ?>"><i class="fa fa-trash" name="btn-trash" aria-hidden="true"></i>&nbsp Trash</a>
				</td>

				<td style="visibility:hidden;"><?= $val['id']; ?></td>	

			</tr>	
		
			<?php } ?>			   	    
	    </tbody>
	  </table>
	</div>








	<div class="container">
	  <div class="m-2">
	  	<h2 class="text-center">Inactive Users(<?= $inactiveUser['total']; ?>)</h2>  
	  
	  	
	  </div>

	  <table class="table table-hover text-center">
	    <thead class="thead-dark">
	      <tr>

	      	<th>#SL</th>
	        <th>Name</th>
	        <th>Email</th>
	        <th>Contact</th>
	        <th>Option</th>
	        
	      </tr>
	    </thead>
	    <tbody>

		    <?php
		    	$info = allDATA($pdo,0);
		    	foreach ($info as $key => $val) {
		    ?>

		    <tr>
		    	
		    	<td><?= $key+1; ?></td>
		    	<td><?= $val['username']; ?></td>
		    	<td><?= $val['email']; ?></td>
		    	<td><?= $val['contact']; ?></td>		    	
				<td>
					<a class="btn btn-warning" style="color: black;" href="action.php?RESTOREid=<?= $val['id']; ?>"><i class="fa fa-window-restore" aria-hidden="true"></i>&nbsp Restore</a>

					<a class="btn btn-danger" style="color: white;" href="action.php?DELid=<?= $val['id']; ?>"><i class="fa fa-trash" name="btn-trash" aria-hidden="true"></i>&nbsp Delete</a>

				</td>
				
			</tr>	
		
			<?php } ?>			   	    
	    </tbody>
	  </table>

		
	</div>







	<!-- The Modal -->
	<div class="modal fade" id="ADDuser">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Adding User</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      <form action="action.php" method="POST">
	      <div class="modal-body">
	      	<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" placeholder="Enter username" name="username"required>
			</div>

			<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" class="form-control" placeholder="Enter Email" name="email" required>
			</div>

			<div class="form-group">
				<label for="contact">Contact:</label>
				<input type="text" class="form-control" placeholder="Enter Contact" name="contact" required>
			</div>

			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" placeholder="Enter Password" name="password" required>
			</div>
	      	
	      </div>

	      <!-- Modal footer -->
	      <div class="modal-footer">
	      	<button type="submit" class="btn btn-primary" name="btn-USERadd">Submit</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      </div>
	    </form>
	    </div>
	  </div>
	</div>
















			<!-- USer edit Modal -->
			<div class="modal fade" id="EDIT-modal">
			  <div class="modal-dialog">
			    <div class="modal-content">

			      <!-- Modal Header -->
			      <div class="modal-header">
			        <h4 class="modal-title">Edit Info</h4>
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>

			      <!-- Modal body -->
			     <form action="action.php" method="POST">
				    <div class="modal-body">
				    	  <div class="form-group">
						    <label for="username">Username:</label>
						    <input type="text" id="username" class="form-control" placeholder="Enter username" name="username"required>
						  </div>
				          
				          <div class="form-group">
						    <label for="email">Email address:</label>
						    <input type="email" id="email" class="form-control" placeholder="Enter email" name="email"required>
						  </div>
						  
						  <div class="form-group">
						    <label for="contact">Contact:</label>
						    <input type="text" id="contact" class="form-control" placeholder="Enter contact" name="contact"required>
						  </div>
						  
						  <div class="form-group">
						    <input type="hidden" id="id" class="form-control" name="id">
						  </div>
	
				    </div>

				      <!-- Modal footer -->
				    <div class="modal-footer">
				      <button type="submit" class="btn btn-primary" name="btn-USERupdate">Submit</button>
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
<script>
	
	// Update user using modal

	$('.btn-userEdit').on('click',function(){
		$('#EDIT-modal').modal('show');

		$tr = $(this).closest('tr');

		var data = $tr.children("td").map(function(){
			return $(this).text();
		}).get();

		$('#username').val(data[1]);
		$('#email').val(data[2]);
		$('#contact').val(data[3]);
		$('#id').val(data[5]);
			
	});
</script>

</body>
</html>

<!-----Java Script for Error Check------->
<?php require_once "errorCheck.php"; ?>