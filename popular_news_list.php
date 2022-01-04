<?php
include_once("functions/database.php");
include_once("functions/page.php");
include_once("functions/is_login.php");
$login=new islogin();
if (!session_id()){//这里使用session_id()判断是否已经开启了Session
    session_start();
}
//显示文件上传的状态信息
if(isset($_GET["message"])){
    echo $_GET["message"]."<br/>";
}
//构造查询所有新闻的SQL语句
$search_sql = "select * from news where state='已审核' order by clicked desc limit 10";
//若进行模糊查询，取得模糊查询的关键字keyword
$keyword = "";
    $data=new database();
    $data->get_connection();
    $conn = mysqli_connect("localhost", "root", "Cai,200019","news");
    //分页的实现
    $result_news = mysqli_query($conn,$search_sql);
    $total_records = mysqli_num_rows($result_news);
    $page_size = 20;
    if(isset($_GET["page_current"])){
        $page_current = $_GET["page_current"];
    }else{
        $page_current=1;
    }
    $start = ($page_current-1)*$page_size;
    $result_sql = "select * from news where state ='已审核' order by clicked desc limit 10";
    $result_set = mysqli_query($conn,$result_sql);
    $data->close_connection();
    if(mysqli_num_rows($result_set)==0){
        exit("暂无记录！");
    }
?>
<ol>
<?php
    while($row = mysqli_fetch_array($result_set)){
        ?>
        <tr>
            <td>
                <li>
                    <a id="pop-news" href="index.php?url=news_detail.php&keyword=<?php echo $keyword?>&news_id=<?php echo $row['news_id']?>"><?php echo mb_strcut($row['title'],0,100,"utf8")?></a>
                </li>
                    <br><br>
            </td>

        </tr>
        <?php
    }
    ?>
</ol>

<?php
$pg=new PG();
$url = $_SERVER["PHP_SELF"];
$pg->page($total_records,$page_size,$page_current,$url,$keyword);
?>
