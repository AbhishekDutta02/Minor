<?php
	$sno = $_POST['sno'];
	
	
	
	// Database connection
	$conn = new mysqli('localhost','root','','user');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("delete from user where sno= ?");
		$stmt->bind_param("i", $sno);
		$execval = $stmt->execute();
		echo $execval;
		echo "User Deleted Successfully...";
		$stmt->close();
		$conn->close();
	}
?>