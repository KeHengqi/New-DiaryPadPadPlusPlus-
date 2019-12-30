<?php

session_start();
$artid = $_POST['artid'];

    $connection = new mysqli("localhost", "root", "", "diary_pad");


    if ($connection->connect_errno) {
        echo "Sorry, this website is experiencing problems.";
        echo "Error: Failed to make a MySQL connection, here is why: \n";
        echo "Errno: " . $connection->connect_errno . "\n";
        echo "Error: " . $connection->connect_error . "\n";
        exit;
    }
    $artid = stripslashes($artid);
    $artid = $connection->real_escape_string($artid);
    $artid = $artid+ 1;
    $artid = (string) $artid;
    $query = "SELECT * FROM article WHERE AID='$artid'";
    $query1 = "SELECT * FROM article WHERE AID='$artid'";
    $result = $connection->query($query);
    if (!$result) {
        die('mysql error');
    }

    if (mysqli_num_rows($result) <= 0) {
        $data = 0;
    } else {
        $result = $connection->query($query1);
        $article = $result->fetch_assoc();
        $_SESSION['article'] = $article['CONTENT'];
        $_SESSION['author']=$article['UNAME'];
        $_SESSION['title'] = $article['TITLE'];
        $data = $article['CONTENT'];
    }
    echo $data;
?>