<?php
session_start();
if(isset($_SESSION['author'])){
    $data = $_SESSION['author'];
    echo $data;
}
else{
    $data = NULL;
    echo $data;
}
?>