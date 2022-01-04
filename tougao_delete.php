<?php
include_once("functions/is_login.php");
$login=new islogin();
if (!session_id()){//这里使用session_id()判断是否已经开启了Session
    session_start();
}
if(!$login->is_login()){
    echo "请您登录系统后，再访问该页面！";
    return;
}
include_once("functions/database.php");
$news_id = $_GET["news_id"];
$conn = @mysqli_connect("localhost", "root", "Cai,200019","news");
$data=new database();
$data->get_connection();

mysqli_query($conn,"delete from news where news_id=$news_id");
$data->close_connection();
$message = "新闻及相关评论信息删除成功！";
echo ("<script type='text/javascript'>alert('删除成功！');window.location.href='index.php?url=tougao_list.php';</script>");
?>
