<?php
header("content-type:text/html;charset=utf8");
?>
<?php
include_once("functions/is_login.php");
session_start();
?>
<?php
include_once("functions/database.php");
$category_id = $_GET["category_id"];
$conn= @mysqli_connect("localhost", "root", "Cai,200019","news");
$data=new database();
$data->get_connection();
mysqli_query($conn,"delete from review where news_id in (select news_id from news where category_id=$category_id)");
mysqli_query($conn,"delete from news where category_id=$category_id");
mysqli_query($conn,"delete from category where category_id=$category_id");
$data->close_connection();
echo ("<script type='text/javascript'>alert('已成功删除该类别及相关新闻！');window.location.href='index.php?url=category_list.php';</script>");

?>