<!DOCTYPE html>
<html>
    <head>
        <title>
            VIEW DATABASE
        </title>
        <link rel="stylesheet" type="text/css" href="v.css">

    </head>
    <body>
        <h1> CRIMINAL DATABASE</h1>
<table border=2>
    <tr>
        <th>Criminal ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Starting of Punishment</th>
        <th>Crime</th>
        <th> Punishment</th>
    </tr>
<?php
$conn = new mysqli('localhost','root','','user');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} 
else
$query="select DISTINCT cld.cid,cld.name,cld.age,cld.pdate,cd.crime,p.punishment from cld,cd,p where cld.crid=cd.crid and p.cid = cld.cid order by cld.cid";
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
        <td>".$result['pdate']."</td>
        <td>".$result['crime']."</td>
        <td>".$result['punishment']."</td>
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