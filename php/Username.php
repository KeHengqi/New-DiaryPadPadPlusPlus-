<?php

$username = $_POST['username'];

$connection = new mysqli("localhost","root","","diary_pad");


if($connection->connect_errno){
    echo "Sorry, this website is experiencing problems.";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $connection->connect_errno . "\n";
    echo "Error: " . $connection->connect_error . "\n";
    exit;
}
$username = stripslashes($username);
$username = $connection->real_escape_string($username);
$query = "SELECT * FROM uname WHERE UNAME='$username'";

$result = $connection->query($query);
if(!$result){
    die('mysql error');
}

if(mysqli_num_rows($result)<=0){
    $data=1;
}
else{
    $data=0;
}
echo $data;
?>