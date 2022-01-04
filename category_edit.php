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
$data=new database();
$data->get_connection();
$conn= @mysqli_connect("localhost", "root", "Cai,200019","news");
$result_category = mysqli_query($conn,"select * from category where category_id = $category_id");
$data->close_connection();
$category = mysqli_fetch_array($result_category);

?>
<form action="index.php?url=category_update.php" method="post">

    类别：<input  type="text"  name="category_name"  value="<?php echo $category['name'];?>">

    <br/>
    <input type="hidden" name="category_id" value="<?php echo $category_id?>">
    <input type="submit" value="修改">
    <input type="button" value="取消" onclick="window.history.back();">

</form>
