<?php
header("content-type:text/html;charset=utf8");
?>
<?php
include_once("functions/is_login.php");
session_start();
?>
<?php
include_once("functions/database.php");
$data=new database();
$category_id = $_POST["category_id"];
$name = $_POST["category_name"];
$conn= @mysqli_connect("localhost", "root", "Cai,200019","news");
$sql = "update category set name='$name' where category_id=$category_id";
$data->get_connection();
mysqli_query($conn,$sql);
$data->close_connection();
echo "新闻类别修改成功！";

?>