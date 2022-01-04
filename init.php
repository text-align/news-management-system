<?php
include_once("functions/database.php");
$data=new database();
$data->get_connection();
$conn = @mysqli_connect("localhost", "root", "Cai,200019","news");
//添加新闻类别
mysqli_query($conn,"insert into category values(null,'娱乐')");
mysqli_query($conn,"insert into category values(null,'财经')");
//添加管理员用户admin，密码admin经过MD5函数双重加密
$password = md5("admin");
mysqli_query($conn,"insert into users values(null,'admin','$password')");
$data->close_connection();
echo "成功添加初始化数据";
?>
