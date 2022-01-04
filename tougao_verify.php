<?php
include_once("functions/is_login.php");
include_once("functions/database.php");
$data=new database();
$login=new islogin();
$conn = @mysqli_connect("localhost", "root", "Cai,200019","news");
session_start();
if(!$login->is_login()){
    echo "请您登录系统后，再访问该页面！";
    return;
}
include_once("functions/database.php");
$news_id = $_GET["news_id"];
$sql = "update news set state='已审核' where news_id=$news_id";
$data->get_connection();
mysqli_query($conn,$sql);
$data->close_connection();
header("Location:index.php?url=tougao_list.php");
?>
