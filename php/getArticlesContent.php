<?php
$connection = new mysqli("localhost", "root", "", "diary_pad");
$arId = $_POST['ID'];
$arId = $arId + 1;
$query_code = "SELECT CONTENT FROM article WHERE AID = '$arId';";
$articleContentResult = $connection->query($query_code);
$result_array = mysqli_fetch_array($articleContentResult);
echo $result_array['CONTENT'];
?>