<?php
require ("../functions/database.php");
$data=new database();
$data->get_connection();
$con=mysqli_connect('localhost','root','Cai,200019','news');
//收集注册数据；
$username = $_POST['add_name'];
$password = $_POST['add_password'];
$upassword = $_POST['upassword'];
$user_password=md5(md5($password));//双重md5加密;
$usernameSQL ="select * from news.users where username='$username'";
$resultSet = mysqli_query($con, $usernameSQL);
$registerSQL = "INSERT INTO news.users  (username,password) VALUES( '$username','$user_password')";

if(mysqli_num_rows($resultSet)>0){
    echo"<script type='text/javascript'>alert(\"用户名已经被占用，请更换其它用户名！\");history.back();</script>";
}

while(!empty($username)&&!empty($password)&&!empty($upassword)){
    mysqli_query($con,"$registerSQL");
    echo"<script type='text/javascript'>alert(\"注册成功\");history.back();</script>";

}
$data->close_connection();
?>