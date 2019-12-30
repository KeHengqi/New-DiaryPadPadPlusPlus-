<?php

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$connection = new mysqli("localhost","root","","diary_pad");


if($connection->connect_errno){
    echo "Sorry, this website is experiencing problems.";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $connection->connect_errno . "\n";
    echo "Error: " . $connection->connect_error . "\n";
    exit;
}
$username = stripslashes($username);
$password = stripslashes($password);
$email = stripslashes($email);
$username = $connection->real_escape_string($username);
$password = $connection->real_escape_string($password);
$email = $connection->real_escape_string($email);

$find = "SELECT * FROM uname WHERE UNAME='$username'";
$query = "INSERT INTO uname VALUES('$username','$password','$email')";
//$query = "SELECT * FROM uname WHERE UNAME='$username' AND PASS='$password' ";

$result = $connection->query($find);
if(!$result){
    $status = 0;
    die('mysql error');
}

if(mysqli_num_rows($result)<=0){
    $connection->query($query);
    $status=1;
}
else{
    $status=0;
}
echo $status;
?>