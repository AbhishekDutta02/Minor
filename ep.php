<?php
	$crid = $_POST['cid'];
	$crime = $_POST['punishment'];
	
	
	// Database connection
	$conn = new mysqli('localhost','root','','user');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into p(cid,punishment) values(?, ?)");
		$stmt->bind_param("is", $crid,$crime);
		$execval = $stmt->execute();
		echo $execval;
		echo "Punishment Details Added Successfully...";
		$stmt->close();
		$conn->close();
	}
?>