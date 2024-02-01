<!DOCTYPE html>
<html>
    <head>
        <title>
            VIEW DATABASE
        </title>
        <link rel="stylesheet" type="text/css" href="v.css">

    </head>
    <body>
        <h1> USER DATABASE</h1>
<table border=2>
    <tr>
        <th>Agent Code</th>
        <th>User Name </th>
        <th>Password</th>
    </tr>
<?php

$tab = $_POST['dept'];
$conn = new mysqli('localhost','root','','user');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} 
else
$query="select * from $tab";
$data= mysqli_query($conn,$query);
$total = mysqli_num_rows($data);


if($total!=0)
{
    while($result=mysqli_fetch_assoc($data))
    {
        echo "
        <tr>
        <td>".$result['sno']."</td>
        <td>".$result['username']."</td>
        <td>".$result['password']."</td>
        </tr>";
    }
}
else{
    echo "NO RECORDS FOUND";
}

$conn->close()
?>
</table>
        
        </body>
    </html>