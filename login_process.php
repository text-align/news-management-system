<?php
include_once("functions/database.php");
$data=new database();
$name = $_POST["name"];
if(isset($_COOKIE["password"])){
	$first_password = $_COOKIE["password"];
}else{
	$first_password = md5($_POST["password"]);
}

$password = md5($first_password);
$sql = "select * from users where username='$name' and password ='$password'";
$data->get_connection();
$conn = @mysqli_connect("localhost", "root", "Cai,200019","news");
$result_set = mysqli_query($conn,$sql);
if(mysqli_num_rows($result_set)>0){
	if(isset($_POST["expire"])){
		$expire = time()+intval($_POST["expire"]);
		setcookie("name",$name,$expire);
		setcookie("password",$first_password,$expire);
	}
	session_start();
	$admin = mysqli_fetch_array($result_set);
	$_SESSION['user_id'] = $admin['user_id'];
	$_SESSION['name'] = $admin['name'];
	header("Location:index.php?login_message=password_right");
}else{
	header("Location:index.php?login_message=password_error");
}
$data->close_connection();
?>
