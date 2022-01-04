

<?php
include_once("functions/database.php");
include_once("functions/page.php");
include_once("functions/is_login.php");
$login=new islogin();
if (!session_id()){//这里使用session_id()判断是否已经开启了Session
    session_start();
}
$keyword = "";
$search_sql = "select category_id from category order by category_id desc";

?>
<table>
    <?php
    $conn= @mysqli_connect("localhost", "root", "Cai,200019","news");
    $data=new database();
    $data->get_connection();
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
$result_sql = "select * from category order by category_id desc limit $start,$page_size";
$result_set = mysqli_query($conn,$result_sql);
$data->close_connection();
if(mysqli_num_rows($result_set)==0){
	exit("暂无记录！");
    }
    while($row = mysqli_fetch_array($result_set)){
        ?>
        <tr>
            
            <td>
              <a href="index.php?url=category_content.php&category_id=<?php echo $row['category_id'] ?>"><?php echo $row['name']?></a>
            </td>

        <?php
        if($login->is_login()){
            ?>
            <td>
                <a class="admin" href="category_edit.php?category_id=<?php echo $row['category_id']?>">&nbsp;&nbsp;编辑</a>
            </td>
            <td>
                <a class="admin" href="category_delete.php?category_id=<?php echo $row['category_id']?>" onclick="return confirm('确定删除吗？');">&nbsp;&nbsp;删除</a>
            </td>
            <?php
        }
        ?>
        </tr>
        <?php
    }
    ?>
</table>
<?php
//打印分页导航条
$pg=new PG();
$url = "index.php?url=category_list.php";
$pg->page($total_records,$page_size,$page_current,$url,$keyword);
?>