<?php
	$cid = $_POST['cid'];
	$Name = $_POST['Name'];
	$age = $_POST['age'];
	$crid = $_POST['crid'];
	$pdate = $_POST['pdate'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','user');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into cld(cid,name, age, crid, pdate) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("isiis", $cid, $Name, $age, $crid, $pdate);
		$execval = $stmt->execute();
		echo $execval;
		echo "Added to Database successfully...";
		$stmt->close();
		$conn->close();
	}
?>