<?php
session_start();
if(isset($_SESSION['loginUser']))
{
    $data = $_SESSION['loginUser'];
    echo $data;
}
else{
    $data = "Guest";
    echo $data;
}
?>