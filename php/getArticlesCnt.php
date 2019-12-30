<?php
$connection = new mysqli("localhost", "root", "", "diary_pad");
$query_code = "SELECT COUNT(*) ARTICLES_CNT FROM article;";
$cnt_result = $connection->query($query_code);
$cnt_result_array = mysqli_fetch_array($cnt_result);
echo $cnt_result_array['ARTICLES_CNT'];
?>