<?php
	
	require_once "dbConnection.php";

	function countUSER($db,$status){
		$sql="select count(*) as total from user where status = '$status';";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		return $row;
	}

	function emailcheck($db,$email){
		$sql="select count(*) as total from user where email like '$email';";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		return $row;
	}


	function allData($pdo,$status)
	{
		$sql="Select * FROM user where status = '$status';";

	    $statement = $pdo->prepare($sql);
		$statement->execute();

		$result = $statement->fetchAll();

		return $result;
	}
	
?>