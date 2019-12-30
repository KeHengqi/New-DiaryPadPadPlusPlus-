<?php
session_start();
if(isset($_SESSION['article'])){
    $data = $_SESSION['article'];
    echo $data;
}
else{
    $data=NULL;
    echo $data;
}
?>