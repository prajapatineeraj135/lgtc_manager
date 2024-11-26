<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lgtc";


$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)

{
     //echo "Connection Ok";
}
else{
    echo "Connection Faild";
}

?>
