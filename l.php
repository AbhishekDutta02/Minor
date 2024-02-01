<?php
	$username= $_POST['un'];
	$password= $_POST['psd'];
    $fg=-1;

	// Database connection
	$conn = new mysqli('localhost','root','','user');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}
     else {

$query="select username,password from user";
$data= mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

if($total!=0)
{
    while($result=mysqli_fetch_assoc($data))
   {
       if($result['username']==$username && $result['password']==$password)
       $fg=0;
   }
}

$query1="select username,password from court";
$data1= mysqli_query($conn,$query1);
$total1 = mysqli_num_rows($data1);

if($total1!=0)
{
    while($result=mysqli_fetch_assoc($data1))
   {
       if($result['username']==$username && $result['password']==$password)
       $fg=1;
   }
}


$query2="select username,password from admin";
$data2= mysqli_query($conn,$query2);
$total2 = mysqli_num_rows($data2);

if($total2!=0)
{
    while($result=mysqli_fetch_assoc($data2))
   {
       if($result['username']==$username && $result['password']==$password)
       $fg=2;
   }
}

$query3="select username,password from deo";
$data3= mysqli_query($conn,$query3);
$total3 = mysqli_num_rows($data3);

if($total3!=0)
{
    while($result=mysqli_fetch_assoc($data3))
   {
       if($result['username']==$username && $result['password']==$password)
       $fg=3;
   }
}




 if ($fg==0)
{
	header("location:http://localhost/MinorP/p.html");
}

elseif ($fg==1)
{
	header("location:http://localhost/MinorP/court.html");
}

elseif ($fg==2)
{
	header("location:http://localhost/MinorP/adm.html");
}

elseif ($fg==3)
{
	header("location:http://localhost/MinorP/d.html");
}

else{
	echo "WRONG CREDENTIALS";
}
		$conn->close();
	}
?>