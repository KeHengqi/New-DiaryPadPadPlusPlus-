<?php
session_start();
$username = $_SESSION['loginUser'];
// echo $_POST['title'];
// echo 'debug';
$connection = new mysqli("localhost","root","","diary_pad");

if($connection->connect_errno) {
    echo 0;
    exit;
}

$last_id_query = "SELECT AID FROM article ORDER BY AID DESC LIMIT 1;";
$row_cnt_query = "SELECT COUNT(*) CNT FROM article";
$row_result = $connection->query($row_cnt_query);
$row_result_array = mysqli_fetch_array($row_result);
$row_cnt = $row_result_array['CNT'];

$aid = 0;
if($row_cnt == 0) {
    $aid = 0;
} else {
    $last_id_result = $connection->query($last_id_query);
    $last_id_array = mysqli_fetch_array($last_id_result);
    $aid = $last_id_array['AID'];
}
$aid = $aid + 1;

$to_submit_article = $_POST['article'];
$to_submit_article = addslashes($to_submit_article);
$title = $_POST['title'];
$title = addslashes($title);
//echo $to_submit_article;
$query = "INSERT INTO article VALUES ('$username', '$aid', '$to_submit_article', '$title')";

$connection->query($query);
// echo $to_submit_article;
echo 1;
?>