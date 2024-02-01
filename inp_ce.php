<?php
	$crid = $_POST['crid'];
	$crime = $_POST['crime'];
	
	
	// Database connection
	$conn = new mysqli('localhost','root','','user');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into cd(crid,crime) values(?, ?)");
		$stmt->bind_param("is", $crid,$crime);
		$execval = $stmt->execute();
		echo $execval;
		echo "Crime Details Added Successfully...";
		$stmt->close();
		$conn->close();
	}
?>