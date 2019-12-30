<?php
session_start();
if(isset($_SESSION['loginUser'])){
    $status = 1;
}
else{
    $status = 0;
}
echo $status;
?>