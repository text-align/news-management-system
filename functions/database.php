<?php 
$database_connection = null;
class database{
function get_connection(){
	$hostname = "localhost"; //���ݿ������������,������IP����
	$database = "news"; //���ݿ���
	$username = "root"; //���ݿ�������û���
	$password = "Cai,200019"; //���ݿ����������
	global $database_connection;
	$database_connection = @mysqli_connect($hostname, $username, $password) ; //�������ݿ������
	mysqli_query($database_connection,"set names 'gbk'");//�����ַ���
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
