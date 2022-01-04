<?php
include_once("functions/is_login.php");
$login=new islogin();
if(isset($_GET["login_message"])) {
    if ($_GET["login_message"] == "password_error") {
        echo ("<script type='text/javascript'>alert('密码错误请重新输入！');history.back();</script>");
    }
    else if ($_GET["login_message"] == "password_right") {
        echo ("<script type='text/javascript'>alert('登录成功！');history.back();</script>");

    }
}
$name = "";
if(isset($_COOKIE["name"])){
	$name = $_COOKIE["name"];
}
$password = "";
if(isset($_COOKIE["password"])){
	$password = $_COOKIE["password"];
}
?>
<link rel="stylesheet" href="css/news.css" type="text/css">
<form action="login_process.php" method="post" name="testform">
用户名：<label>
        <input type="text" name="name" size="11" value="<?php echo $name?>" />
    </label><br/>
密 码 ：<label>
        <input type="password" name="password" size="11" value="<?php echo $password?>" />
    </label><br/>
<br/><br/>
<input class="btn" type="submit" value="登录" />
    <input class="btn" type="button" value="注销" onclick="location=window.location.href='logout.php'">
</form>
