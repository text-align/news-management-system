<?php
include_once("functions/is_login.php");
include_once("functions/database.php");
$data=new database();
$login=new islogin();
if (!session_id()){//这里使用session_id()判断是否已经开启了Session
    session_start();
}
if(!$login->is_login()){
    echo ("<script type='text/javascript'>alert(\"该页面仅对管理员开放！\");history.back()</script>");
    return;
}
?>
<?php
include_once("functions/database.php");
include_once("functions/page.php");
$sql = "select * from news where state='未审核' order by news_id desc";
$data->get_connection();
$conn = @mysqli_connect("localhost", "root", "Cai,200019","news");
//分页的实现
$result_news = mysqli_query($conn,$sql);
$total_records = mysqli_num_rows($result_news);
$keyword="";
$page_size = 4;
if(isset($_GET["page_current"])){
    $page_current = $_GET["page_current"];
}else{
    $page_current=1;
}
$start = ($page_current-1)*$page_size;
$result_sql = "select * from news where state='未审核' order by news_id desc limit $start,$page_size";
$result_set = mysqli_query($conn,$result_sql);
$data->close_connection();
echo "待审核新闻信息如下：<br/><br/>";
while($row = mysqli_fetch_array($result_set)) {
    ?>

    <tr>

        <td>
            <a href="index.php?url=tougao_detail.php&news_id=<?php echo $row['news_id']?>"><?php echo mb_strcut($row['title'],0,100,"utf8")?></a><br><br>
</td>

</tr>
<?php
    }
    ?>
<?php



//分页的实现
$pg=new PG();
$url = "index.php?url=tougao_list.php";
$pg->page($total_records,$page_size,$page_current,$url,$keyword);
?>
