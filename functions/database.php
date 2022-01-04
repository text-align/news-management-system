<?php 
$database_connection = null;
class database{
function get_connection(){
	$hostname = "localhost"; //数据库服务器主机名,可以用IP代替
	$database = "news"; //数据库名
	$username = "root"; //数据库服务器用户名
	$password = "Cai,200019"; //数据库服务器密码
	global $database_connection;
	$database_connection = @mysqli_connect($hostname, $username, $password) ; //连接数据库服务器
	mysqli_query($database_connection,"set names 'gbk'");//设置字符集
	@mysqli_select_db($database_connection,$database) or die(mysqli_error($database_connection));
}
function close_connection(){
	global $database_connection;
	if($database_connection){
		mysqli_close($database_connection) or die(mysqli_error($database_connection));
	}
}
}
?>
