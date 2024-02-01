<?php
	$cid = $_POST['cid'];
	
	$p = $_POST['punishment'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','user');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("update p set punishment = ? where cid= ?");
		$stmt->bind_param("si", $p,$cid);
		$execval = $stmt->execute();
		echo $execval;
		echo "Result Changed Successfully...";
		$stmt->close();
		$conn->close();
	}
?>