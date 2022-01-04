
<?php
include_once ('./functions/database.php');
include_once("functions/page.php");
include_once("functions/is_login.php");
$login=new islogin();
if (!session_id()){//这里使用session_id()判断是否已经开启了Session
    session_start();
}
@$id=$_GET['category_id'];
$search_sql = "select category_id from news where category_id='$id' order by news_id desc ";
$keyword = "";
?>
<table>
<?php
$conn= @mysqli_connect("localhost", "root", "Cai,200019","news");

$data=new database();
$data->get_connection();

//构造查询所有新闻的SQL语句
$result_news = mysqli_query($conn,$search_sql);
$total_records = mysqli_num_rows($result_news);
$page_size = 4;
if(isset($_GET["page_current"])){
    $page_current = $_GET["page_current"];
}else{
    $page_current=1;
}
$start = ($page_current-1)*$page_size;
$result_sql = "select * from news where category_id='$id'order by news_id limit $start, $page_size";
$result_set = mysqli_query($conn,$result_sql);
$data->close_connection();
if(mysqli_num_rows($result_set)==0){
    exit("暂无记录！");
}
while($row = mysqli_fetch_array($result_set)){
    ?>
    <tr>

        <td>
            <a href="index.php?url=news_detail.php&news_id=<?php echo $row['news_id']?>"><?php echo mb_strcut($row['title'],0,100,"utf8")?></a><br><br>
        </td>

    </tr>
    <?php
}
?>
</table>


<?php
//打印分页导航条
$pg=new PG();
$url = "index.php?url=category_content.php";
$pg->page($total_records,$page_size,$page_current,$url,$keyword);
?>
