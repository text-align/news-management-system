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
$review_id = $_GET["review_id"];
$sql = "delete from review where review_id=$review_id";
$data->get_connection();
$result_set = mysqli_query($conn,$sql);
$data->close_connection();
echo ("<script type='text/javascript'>alert('删除成功！');window.location.href='index.php?url=review_list.php';</script>");
?>
