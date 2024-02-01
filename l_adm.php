<?php
	$username= $_POST['un'];
	$password= $_POST['psd'];
    $flag=0;

	// Database connection
	$conn = new mysqli('localhost','root','','user');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}
     else {
$query="select username,password from user where sno=1";
$data= mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
if($total!=0)
{
    while($result=mysqli_fetch_assoc($data))
   {
       if($result['username']==$username && $result['password']==$password)
       $flag=1;
   }
}

 if ($flag==1)
{
	header("location:http://localhost/_CRMS/adm.html");
}
else{
	echo "WRONG CREDENTIALS";
}
		$conn->close();
	}
?>