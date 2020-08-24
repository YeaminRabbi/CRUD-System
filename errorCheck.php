<?php
	$msg="";


	if(isset($_GET['msg']))
	{
		$msg=$_GET['msg'];

		if($msg=="invalidLogin"){
			echo "<script type='text/javascript'>
	               Swal.fire({
				  position: 'center',
				  icon: 'warning',
				  title: 'Invalid Input',
				  showConfirmButton: false,
				  timer: 1000
				})
	            </script>";
		}

		if($msg=="udpated"){
			echo "<script type='text/javascript'>
	               Swal.fire({
				  position: 'center',
				  icon: 'success',
				  title: 'Successful Input',
				  showConfirmButton: false,
				  timer: 1000
				})
	            </script>";
		}

		if($msg=="upError"){
			echo "<script type='text/javascript'>
	               Swal.fire({
				  position: 'center',
				  icon: 'danger',
				  title: 'Error Found',
				  showConfirmButton: false,
				  timer: 1000
				})
	            </script>";
		}


		if($msg=="upError"){
			echo "<script type='text/javascript'>
	               Swal.fire({
				  position: 'center',
				  icon: 'danger',
				  title: 'Error Found',
				  showConfirmButton: false,
				  timer: 1000
				})
	            </script>";
		}

		if($msg=="TrashError"){
			echo "<script type='text/javascript'>
	               Swal.fire({
				  position: 'center',
				  icon: 'danger',
				  title: 'Error Found',
				  showConfirmButton: false,
				  timer: 1000
				})
	            </script>";
		}

		if($msg=="Trash"){
			echo "<script type='text/javascript'>
	               Swal.fire({
				  position: 'center',
				  icon: 'success',
				  title: 'User moved to Trash',
				  showConfirmButton: false,
				  timer: 800
				})
	            </script>";
		}

		if($msg=="restore"){
			echo "<script type='text/javascript'>
	               Swal.fire({
				  position: 'center',
				  icon: 'success',
				  title: 'User Restored',
				  showConfirmButton: false,
				  timer: 700
				})
	            </script>";
		}

		if($msg=="delete"){
			echo "<script type='text/javascript'>
	               Swal.fire({
				  position: 'center',
				  icon: 'success',
				  title: 'User Deleted',
				  showConfirmButton: false,
				  timer: 700
				})
	            </script>";
		}

		if($msg=="USERADDED"){
			echo "<script type='text/javascript'>
	               Swal.fire({
				  position: 'center',
				  icon: 'success',
				  title: 'User Added',
				  showConfirmButton: false,
				  timer: 800
				})
	            </script>";
		}

		if($msg=="emailfound"){
			echo "<script type='text/javascript'>
	               Swal.fire({
				  position: 'center',
				  icon: 'warning',
				  title: 'Email Exist Already',
				  showConfirmButton: false,
				  timer: 800
				})
	            </script>";
		}
		

		
	}

	

	
?>