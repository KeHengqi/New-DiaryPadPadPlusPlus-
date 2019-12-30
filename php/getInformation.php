<?php
session_start();
if(isset($_SESSION['loginUser'])){
    $status = $_SESSION['loginUser'];
}
else{
    $status = 0;
}
echo $status;
?>