<?php
include_once("functions/is_login.php");
session_start();
$login=new islogin();

include_once("functions/file_system.php");
if(empty($_POST)){
	$message = "上传的文件超过了php.ini中post_max_size选项限制的值";
}else{
	$conn = @mysqli_connect("localhost", "root", "Cai,200019","news");
	$user_id = $_SESSION["user_id"];
	$category_id = $_POST["category_id"];
	$title = $_POST["title"];
	$content = $_POST["content"];
	$currentDate =  date("Y-m-d H:i:s");
	$clicked = 0;
	$state = '已审核';
	$file_name = $_FILES["news_file"]["name"];
	$message = upload($_FILES["news_file"],"uploads");
	$sql = "insert into news values(null,'$user_id','$category_id','$title','$content','$currentDate',$clicked,'$file_name','$state')";
	if($message=="文件上传成功！"||$message=="没有选择上传附件！"){
		include_once("functions/database.php");
		$data=new database();
		$data->get_connection();
		mysqli_query($conn,$sql);
		$data->close_connection();
	}	
}
header("Location:index.php?url=news_list.php&message=$message");
?>

<?php
$content=$_POST['content'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>CKEditor and CKFinder serverside</title>
</head>
<body>
<?php
echo stripslashes($content);
?>
</body>
</html>

