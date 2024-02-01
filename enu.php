<?php
    $tab = $_POST['dept'];
	$sno = $_POST['sno'];
	$username = $_POST['un'];
	$password = $_POST['psd'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','user');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into $tab (sno,username,password) values(?, ?, ?)");
		$stmt->bind_param("iss" , $sno, $username, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "User Added Successfully...";
		$stmt->close();
		$conn->close();
	}
?>