<?php
	require_once "dbConnection.php";
	require_once "Cfunction.php";
	session_start();

	$reg_page="register.php";
	$count=0;
	if(isset($_POST['reg-btn']))
	{
		$username=$_POST['username'];
		$email=$_POST['email'];
		$contact=$_POST['contact'];
		$password=$_POST['password'];

		if(!$username || !$email || !$contact || !$password)
		{
			$_SESSION['data-error']="All Feilds must be filled";
			header("Location: ".$reg_page);
		}
		
		else
		{
			if(strlen($username)<4)
			{
				$_SESSION['username-error']="Cannot be less than 4 Characters";
				header("Location: ".$reg_page);
			}
			else{
				$count=$count+1;
			}

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
				$_SESSION['email-error'] = "Invalid email format";
				header("Location: ".$reg_page);
			}
			else{
				$count=$count+1;
			}

			if(isset($password))
			{
				// Validate password strength
				$uppercase = preg_match('@[A-Z]@', $password);
				$lowercase = preg_match('@[a-z]@', $password);
				$number    = preg_match('@[0-9]@', $password);
				$specialChars = preg_match('@[^\w]@', $password);

				
				if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) 
				{
					$_SESSION['password-error'] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
					header("Location: ".$reg_page);
				}
				else $count=$count+1;

				
			}
			
			if(isset($contact))
			{

				$cuppercase = preg_match('@[A-Z]@', $contact);
				$clowercase = preg_match('@[a-z]@', $contact);
				$cspecialChars = preg_match('@[^\w]@', $contact);


				if($cuppercase==1 || $clowercase==1 || $cspecialChars==1 || strlen($contact)!=11){
					$_SESSION['contact-error'] = "Invalid Contact Number";
					header("Location: ".$reg_page);
				}
				else{
					$count=$count+1;
				}
					
			}

			if($count==4){
				//hashing the password
				$hash_password= md5($password);
				$query = $db->prepare("insert into user (username, email, password, contact) values (?,?,?,?)");
				$query->bind_param("ssss", $username,$email,$hash_password,$contact);
				$query->execute();
				echo '<h2> Data Input Completed</h2>';
				header("Location: index.php");
			}	
				
		}

	}





	if(isset($_POST['btn-LOGIN']))
	{
		
		$input_password=md5($_POST['password']);
		$input_email=$_POST['email'];

		$sql = "SELECT * from user where email = :email and password= :password";
	    $stmt = $pdo->prepare($sql);
	    $stmt->execute(array(
	        ':email' => $input_email,
	        ':password' => $input_password));

	    if($stmt->rowCount()==1){
	    	header("Location: dashboard.php");
	    }
	    else
	    {
	    	header("Location: index.php?msg=invalidLogin");
	    }
	}


	if(isset($_POST['btn-USERupdate'])){
		$id=$_POST['id'];
		$username=$_POST['username'];
		$email=$_POST['email'];
		$contact=$_POST['contact'];

		$sql="UPDATE `user` SET `username`='$username',`email`='$email',`contact`='$contact' where id= '$id';";
		if ($db->query($sql) === TRUE) {
		  header("Location: dashboard.php?msg=udpated");
		} else {
		  header("Location: dashboard.php?msg=upError");
		}
	}

	if(isset($_GET['userid']))
	{
		$id=$_GET['userid'];
		$sql="UPDATE `user` SET `status`= 0 where id= '$id';";
		if ($db->query($sql) === TRUE) {
		  header("Location: dashboard.php?msg=Trash");
			
		} else {
		  header("Location: dashboard.php?msg=TrashError");
			
		}

	}

	if(isset($_GET['RESTOREid']))
	{
		$id=$_GET['RESTOREid'];

		$sql="UPDATE `user` SET `status`= 1 where id= '$id';";
		if ($db->query($sql) === TRUE) {
		  header("Location: dashboard.php?msg=restore");
			
		} else {
		  header("Location: dashboard.php?msg=TrashError");
			
		}
	}

	if(isset($_GET['DELid']))
	{
		$id=$_GET['DELid'];

		$sql="DELETE FROM `user` WHERE id ='$id';";

		if ($db->query($sql) === TRUE) {
		  header("Location: dashboard.php?msg=delete");
			
		} else {
		  header("Location: dashboard.php");
			
		}
	}


	if(isset($_POST['btn-USERadd']))
	{
		$username= $_POST['username'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$password= md5($_POST['password']);

		$emailcount=emailcheck($db,$email);

		$sql="INSERT INTO `user`(`username`, `email`, `password`, `contact`, `status`) VALUES ('$username','$email','$password','$contact', 1)";

			if ($db->query($sql) === TRUE) {
			  header("Location: dashboard.php?msg=USERADDED");
				
			} else {
			  header("Location: dashboard.php");
				
			}

	}
?>