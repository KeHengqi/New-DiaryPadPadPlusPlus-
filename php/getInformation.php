<?php
session_start();
if(isset($_SESSION['loginUser'])){
    $status = $_SESSION['loginUser'];
}
else{
    $status = "Guest";
}
echo $status;
?>