<!DOCTYPE html>
<html>
    <head>
        <title>
            VIEW DATABASE
        </title>
        <link rel="stylesheet" type="text/css" href="v.css">

    </head>
    <body>
        <h1>  DATABASE</h1>
<table border=2>
    <tr>
        <th>CRIMINAL ID</th>
        <th>NAME</th>
        <th>AGE</th>
        <th>IPC SECTION</th>
        <th>DATE OF IMPRISON</th>
    </tr>
<?php
$conn = new mysqli('localhost','root','','user');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} 
else
$query="select * from cld";
$data= mysqli_query($conn,$query);
$total = mysqli_num_rows($data);


if($total!=0)
{
    while($result=mysqli_fetch_assoc($data))
    {
        echo "
        <tr>
        <td>".$result['cid']."</td>
        <td>".$result['name']."</td>
        <td>".$result['age']."</td>
        <td>".$result['crid']."</td>
        <td>".$result['pdate']."</td>
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