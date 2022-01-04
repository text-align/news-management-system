<?php
include_once("functions/is_login.php");
include_once("functions/database.php");
$data=new database();
$login=new islogin();
$conn = @mysqli_connect("localhost", "root", "Cai,200019","news");
if(!session_id()){//这里使用session_id()判断是否已经开启了Session
	session_start();
}
if(!$login->is_login()){
	echo "请您登录系统后，再访问该页面！";
	return;
}
include_once("functions/database.php");
$news_id = $_POST["news_id"];
$category_id = $_POST["category_id"];
$title = $_POST["title"];
$content = $_POST["content"];
$sql = "update news set category_id=$category_id,title='$title',content='$content' where news_id='$news_id'";
$data->get_connection();
mysqli_query($conn,$sql);
$data->close_connection();
$message = "新闻信息修改成功！";
header("Location:index.php?url=news_list.php&message=$message");
?>
