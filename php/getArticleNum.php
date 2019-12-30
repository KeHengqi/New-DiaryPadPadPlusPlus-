<?php
session_start();
$user = $_SESSION['loginUser'];
$connection = new mysqli("localhost","root","","diary_pad");
if($connection->connect_error){
    echo "Sorry, this website is experiencing problems.";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $connection->connect_errno . "\n";
    echo "Error: " . $connection->connect_error . "\n";
    exit;
}
$query = "SELECT * FROM article where UNAME = '$user'";
$result = $connection->query($query);
$num = $connection->affected_rows;
echo $num;
?>
