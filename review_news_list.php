<?php
include_once("functions/is_login.php");
include_once("functions/database.php");
$data=new database();
$login=new islogin();
if (!session_id()){//这里使用session_id()判断是否已经开启了Session
    session_start();
}

?>
<?php
include_once("functions/database.php");
include_once("functions/page.php");
@$id=$_GET['news_id'];
$keyword="";
$search_sql = "select review_id from review where news_id='$id' order by review_id desc";
$data->get_connection();
$conn = @mysqli_connect("localhost", "root", "Cai,200019","news");
//分页的实现
$result_news = mysqli_query($conn,$search_sql);
$total_records = mysqli_num_rows($result_news);
$page_size = 5;
if(isset($_GET["page_current"])){
    $page_current = $_GET["page_current"];
}else{
    $page_current=1;
}
$start = ($page_current-1)*$page_size;
$result_sql = "select * from review where news_id='$id'order by review_id limit $start, $page_size";
$result_set = mysqli_query($conn,$result_sql);
$data->close_connection();

echo "新闻发布系统的所有评论信息如下：<br/><br/>";
while($row = mysqli_fetch_array($result_set)) {
    echo "新闻标题：" . $row['news_id'] . "<br/>";
    echo "评论内容：" . $row["content"] . "<br/>";
    echo "日期：" . $row["publish_time"] . "&nbsp;&nbsp;";
    echo "IP地址：" . $row["ip"] . "&nbsp;&nbsp;";
    echo "<hr/>";
}

//分页的实现
$pg=new PG();
$url = "index.php?url=review_news_list.php";
$pg->page($total_records,$page_size,$page_current,$url,$keyword);
?>
