
<!DOCTYPE html>
<html>
<head>
    <title>添加分类</title>
</head>
<script type="text/javascript">
    function check() {
        var category=document.getElementById("category").value;
   if(!category){
       alert('类别不能为空');
       return false;
   }
   else{
   return true;
   }
    }
</script>
<body>

<?php
include_once("functions/is_login.php");
$login=new islogin();
if (!session_id()){//这里使用session_id()判断是否已经开启了Session
    session_start();
}
if(!$login->is_login()){
    echo ("<script type='text/javascript'>alert(\"此功能仅对管理员开放！\");history.back()</script>");
    return;
}
?>
<div class="add">
    <form class="search" action="index.php?url=category_add.php" method="post" name="myform"  enctype="multipart/form-data" onsubmit="return check();" >
        类别：<input type="text" id="category" name="category" placeholder="请输入类别">
        <input class="lu-btn-3d" type="submit" value="提交" >
        <input class="lu-btn-3d" type="reset" value="重置">
    </form>
</div>
</body>
</html>

<?php

include_once("../news/functions/database.php");
$data=new database();
$category = @$_POST["category"];
$conn= @mysqli_connect("localhost", "root", "Cai,200019","news");
$sql = "insert into category values(null,'$category')";
$data->get_connection();
$resultset=mysqli_query($conn,"select * from news.category where  name = '$category'");

 if(mysqli_num_rows($resultset)>0){
    echo ("<script type='text/javascript'>alert(\"该类别已存在！\");history.back()</script>");
    }
    else if($category!=null){
        mysqli_query($conn,"$sql");
        echo ("<script type='text/javascript'>alert(\"添加成功！\");history.back()</script>");
    }
    $data->close_connection();

?>
