<?php
include_once("functions/database.php");
$data=new database();
$conn = @mysqli_connect("localhost", "root", "Cai,200019","news");
$news_id = $_POST["news_id"];
$content = htmlspecialchars($_POST["content"]);
$currentDate = date("Y-m-d H:i:s");
$ip = $_SERVER["REMOTE_ADDR"];
$state = "未审核";
$sql = "insert into review values(null,$news_id,'$content','$currentDate','$state','$ip')";
$data->get_connection();
mysqli_query($conn,$sql);
$data->close_connection();
$message = "该新闻的评论信息成功添加到数据库表中！";
header("Location:index.php?url=news_list.php&message=$message");
?>
