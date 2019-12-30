<?php

$email = $_POST['email'];

$connection = new mysqli("localhost","root","","diary_pad");


if($connection->connect_errno){
    echo "Sorry, this website is experiencing problems.";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $connection->connect_errno . "\n";
    echo "Error: " . $connection->connect_error . "\n";
    exit;
}
$email = stripslashes($email);
$email = $connection->real_escape_string($email);
$query = "SELECT * FROM uname WHERE EMAIL='$email'";

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