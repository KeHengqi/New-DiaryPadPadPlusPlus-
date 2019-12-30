<?php
session_start();
if(isset($_SESSION['loginUser'])){

    if(session_destroy()){
        $status = 1;
    }
    else{
        $status = 0;
    }
}
else {
    $status = 1;
}
echo $status;
?>