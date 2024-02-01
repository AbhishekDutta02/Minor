<?php
$tab = $_POST['dept'];
	$sno = $_POST['sno'];
	
	$password = $_POST['psd'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','user');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("update ? set password = ? where sno= ?");
		$stmt->bind_param("ssi",$tab,$password,$sno);
		$execval = $stmt->execute();
		echo $execval;
		echo "Password Changed Successfully...";
		$stmt->close();
		$conn->close();
	}
?>